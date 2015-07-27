<?php namespace App\Http\Controllers;

use App;
use App\Libraries\ResponseHelper;
use App\Models\AskHenry;
use Config;
use DB;
use Request;
use Session;
use Thujohn\Twitter;

Class AskHenryController extends Controller {

	public function submitQuestion() {
		$question = Request::input("question");
		if (!$question) {
			return ResponseHelper::OutputJSON('fail', 'missing parameter');
		}

		if (strlen($question) < 5 || strlen($question) > 140) {
			return ResponseHelper::OutputJSON('fail', 'question too long or too short');
		}

		try {
			if (preg_match('/^https:\/\/twitter.com\/.+?\/status\/(?P<tweetId>\d+)$/i', $question, $matches)) {
				$tweetId = $matches['tweetId'];
				$tweet = \Twitter::getTweet($tweetId);

				$askHenry = new AskHenry;
				$askHenry->twitter_user_id = $tweet->user->id_str;
				$askHenry->twitter_screen_name = $tweet->user->screen_name;
				$askHenry->twitter_post_id = $tweet->id_str;
				$askHenry->question = $tweet->text;
				$askHenry->answered_at = DB::raw('NOW()');
				$askHenry->save();

				return ResponseHelper::OutputJSON('success', '', $tweet->id_str);

			} else {
				$question .= ' #' . Config::get('app.askhenry_hashtag');

				$token = Session::get('twitter_access_token');
				\Twitter::reconfig([
					'token' => $token['oauth_token'],
					'secret' => $token['oauth_token_secret'],
				]);

				$credential = \Twitter::query("account/verify_credentials");

				$tweet = \Twitter::postTweet(['status' => $question, 'format' => 'json']);
				$tweet = json_decode($tweet);

				$askHenry = new AskHenry;
				$askHenry->twitter_user_id = $credential->id_str;
				$askHenry->twitter_screen_name = $credential->screen_name;
				$askHenry->twitter_post_id = $tweet->id_str;
				$askHenry->question = $question;
				$askHenry->answered_at = DB::raw('NOW()');
				$askHenry->save();

				return ResponseHelper::OutputJSON('success', '', $tweet->id_str);
			}
		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('exception');

		}
	}

	public function getQuestions() {
		$status = Request::input("status", 'approved');
		$category = Request::input("category", 'all');
		$page = Request::input("page", 1);
		if (is_array($page)) {$page = 1;}
		$perPage = Request::input("per_page", 30);

		$inputs = Request::all();
		$inputs['page'] = $page;
		Request::replace($inputs);

		try {
			if ($category == 'all') {
				$questions = AskHenry::where('status', $status)->where('enable', 1)->orderBy('answered_at', 'desc')->orderBy('created_at', 'desc')->paginate($perPage);
			} else {
				$questions = AskHenry::where('status', $status)->where('category', $category)->where('enable', 1)->orderBy('answered_at', 'desc')->orderBy('created_at', 'desc')->paginate($perPage);
			}

			return ResponseHelper::OutputJSON('success', '', [
				'questions' => $questions->toArray(),
			]);

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('exception');

		}
	}

	public function reply($id) {
		$question = Request::input("question");
		$answer = Request::input("answer");
		$category = Request::input("category");
		$targetScreenName = Request::input("screen_name");
		$statusId = Request::input("status_id");

		if (!$question || !$answer || !$category) {
			return ResponseHelper::OutputJSON('fail', 'missing parameter');
		}

		try {
			$askHenry = AskHenry::find($id);
			if (!$question) {
				return ResponseHelper::OutputJSON('fail', 'question not found');
			}

			$postTwitter = $askHenry->replied_twitter == 0;

			$askHenry->question = $question;
			$askHenry->answer = $answer;
			$askHenry->category = $category;
			$askHenry->replied_twitter = 1;
			$askHenry->answered_at = DB::raw('NOW()');
			$askHenry->status = 'approved';
			$askHenry->save();

			if ($postTwitter) {
				//reply in twitter as well
				$token = Session::get('twitter_access_token');
				\Twitter::reconfig([
					'token' => Config::get('app.twitter_access_token'),
					'secret' => Config::get('app.twitter_access_token_secret'),
				]);

				$longUrl = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_ask_henry_each', ['id' => $id]);
				$bitLyRes = file_get_contents("http://api.bit.ly/v3/shorten?login=o_2s73ljvg77&apiKey=R_bf8c8ac772ed496eb1a3061dc4828b5e&longUrl=" . urlencode($longUrl) . "&format=json");
				$bitLyRes = json_decode($bitLyRes, true);
				$shortUrl = $bitLyRes['data']['url'];

				$tweetText = '@' . $targetScreenName . ' Mr. Middleton has answered your question! Click here to see his reply:';
				$tweetText .= ' ' . $shortUrl . ' #' . Config::get('app.askhenry_hashtag'); //1+21+1+9=32, 140-32=108

				$tweet = \Twitter::postTweet(['status' => $tweetText, 'in_reply_to_status_id' => $statusId, 'format' => 'json']);

			}

			return ResponseHelper::OutputJSON('success');

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('exception');

		}
	}

	public function setStatus($id) {
		$status = Request::input("status");
		if (!$status) {
			return ResponseHelper::OutputJSON('fail', 'missing parameter');
		}

		try {
			$question = AskHenry::find($id);
			if (!$question) {
				return ResponseHelper::OutputJSON('fail', 'question not found');
			}

			$question->status = $status;
			$question->save();

			return ResponseHelper::OutputJSON('success');

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('exception');

		}
	}

}
