<?php namespace App\Http\Controllers;

use App;
use App\Libraries\LogHelper;
use App\Libraries\ResponseHelper;
use App\Models\DFCLeaderboard;
use Exception;
use Request;

Class DFCController extends Controller {

	public function getLeaderboard() {
		try {
			$leaderboard = DFCLeaderboard::where('score', '!=', 0)->orderBy('score', 'desc')->take(10)->select('name', 'score')->get();

			return ResponseHelper::OutputJSON('success', '', [
				'leaderboard' => $leaderboard,
			]);
		} catch (Exception $ex) {
			LogHelper::LogToDatabase($ex->getMessage(), ['environment' => json_encode([
				'inputs' => Request::all(),
			])]);
			return ResponseHelper::OutputJSON('exception', 'db exception');
		}

	}

	public function updateTopscore() {
		$name = Request::input("name");
		$score = Request::input("score");
		$key = Request::input("key");
		$hash = Request::input("hash");

		if (!$name || !$score || !$key || !$hash) {
			return ResponseHelper::OutputJSON('fail', 'missing parameters');
		}

		$hash1 = sha1($score . $key . config('app.game_secret'));
		if ($hash !== $hash1) {
			return ResponseHelper::OutputJSON('fail', 'invalid hash');
		}

		$submission = DFCLeaderboard::where('hash', $hash)->first();
		if ($submission) {
			return ResponseHelper::OutputJSON('fail', 'no double submit');
		}

		$submission = new DFCLeaderboard;
		$submission->name = $name;
		$submission->score = $score;
		$submission->hash = $hash;
		$submission->save();

		return ResponseHelper::OutputJSON('success');

	}

}
