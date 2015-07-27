<?php namespace App\Http\Controllers;

use App;
use App\Libraries\LogHelper;
use App\Libraries\ResponseHelper;
use App\Models\GameLeaderboard;
use App\Models\GameSubmission;
use Config;
use DB;
use Exception;
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\GraphUser;
use Request;
use Session;

Class GameController extends Controller {

	public function getQuestions() {
		try {
			$sql = "
				SELECT `id`, `stage`, `question`, `answer`, `options`
					FROM (
						SELECT *, RAND() AS `rand`
							FROM `t0121_game`
								ORDER BY `rand`
					) g
						GROUP BY `stage`
			";

			$questions = DB::select($sql);

			return ResponseHelper::OutputJSON('success', '', [
				'questions' => $questions,
			]);
		} catch (Exception $ex) {
			LogHelper::LogToDatabase($ex->getMessage(), ['environment' => json_encode([
				'inputs' => Request::all(),
			])]);
			return ResponseHelper::OutputJSON('exception', 'fb exception');
		}

	}

	public function submitGamePlay() {

		$fbAccessToken = Request::input("facebook_access_token");
		$playTime = Request::input("play_time"); //in seconds
		$key = Request::input("key");
		$hash = Request::input("hash");
		if (!$fbAccessToken) {
			return ResponseHelper::OutputJSON('fail', 'missing facebook session');
		}

		if (!$playTime || !$key || !$hash) {
			return ResponseHelper::OutputJSON('fail', 'missing parameters');
		}

		$hash1 = sha1($playTime . $key . config('app.game_secret'));
		if ($hash !== $hash1) {
			return ResponseHelper::OutputJSON('fail', 'invalid hash');
		}

		$submission = GameSubmission::where('hash', $hash)->first();
		if ($submission) {
			return ResponseHelper::OutputJSON('fail', 'no double submit');
		}

		FacebookSession::setDefaultApplication(config('app.facebook_app_id'), config('app.facebook_app_secret'));
		try {
			$session = new FacebookSession($fbAccessToken);
			if (!$session) {
				return ResponseHelper::OutputJSON('fail', 'facebook session not found');
			}

			$fbUser = (new FacebookRequest(
				$session, 'GET', '/me'
			))->execute()->getGraphObject(GraphUser::className());

			$submission = new GameSubmission;
			$submission->facebook_id = $fbUser->getId();
			$submission->facebook_name = $fbUser->getName();
			$submission->facebook_email = (is_null($fbUser->getProperty("email"))) ? "" : $fbUser->getProperty("email");
			$submission->play_time = $playTime;
			$submission->hash = $hash;
			$submission->save();

			$sql = "
				SELECT FIND_IN_SET( `play_time`, ( SELECT GROUP_CONCAT( DISTINCT `play_time` ORDER BY `play_time` ASC ) FROM `t0122_game_submission` ) ) AS `rank`
					FROM `t0122_game_submission`
						WHERE `id` = :id
							ORDER BY `rank` ASC
								LIMIT 1;
			";

			$rankMe = DB::select($sql, ['id' => $submission->id]);

			//update leaderboard
			//will need to remove if it is cause slow
			DB::table('t0123_game_leaderboard')->truncate();
			$sql = "
				INSERT INTO `t0123_game_leaderboard`
				(`facebook_id`, `facebook_name`, `facebook_email`, `play_time_min`, `play_time_sec`, `played_at`, `rank`)
					SELECT `facebook_id`, `facebook_name`, `facebook_email`, FLOOR(`play_time` / 60), MOD(`play_time`, 60), `created_at`,
							FIND_IN_SET( `play_time`, ( SELECT GROUP_CONCAT(DISTINCT `play_time` ORDER BY `play_time` ASC ) FROM `t0122_game_submission` ) ) AS `rank`
								FROM `t0122_game_submission`
									ORDER BY `play_time` ASC
										LIMIT 30;
			";
			DB::insert($sql);

			$leaderboard = GameLeaderboard::orderBy('rank', 'asc')->take(30)->get();
			$rankMe = GameLeaderboard::where('rank', $rankMe[0]->rank)->first();

			Session::put('rank_me', $rankMe);

			return ResponseHelper::OutputJSON('success', '', [
				'rank_me' => $rankMe,
				'leaderboard' => $leaderboard->toArray(),
			]);

		} catch (Exception $ex) {
			LogHelper::LogToDatabase($ex->getMessage(), ['environment' => json_encode([
				'inputs' => Request::all(),
			])]);
			return ResponseHelper::OutputJSON('exception', $ex->getMessage());
		}

	}

	public function leaderboard() {
		$leaderboard = GameLeaderboard::orderBy('rank', 'asc')->take(10)->get();
		return ResponseHelper::OutputJSON('success', '', [
			'rank_me' => Session::get('rank_me'),
			'leaderboard' => $leaderboard->toArray(),

		]);
	}

}
