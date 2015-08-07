<?php namespace App\Http\Controllers;

use App;
use App\Models\AboutCharacterEn;
use App\Models\AboutCharacterMs;
use App\Models\Article;
use App\Models\AskHenry;
use App\Models\ClassroomExercise;
use App\Models\MeetCharacters;
use App\Models\HomeBanner;
use App\Models\PopQuiz;
use App\Models\VideoTrailerEn;
use App\Models\VideoTrailerMs;
use App\Models\Week;
use Request;
use View;

class AdminPageController extends Controller {

	/**
	 * Show the user page.
	 */
	function weekList() {
		$weeks = Week::orderBy('week', 'asc')->get();
		return view('admin.exercise-week-list', ['weeks' => $weeks]);
	}

	function exerciseTemplate($week, $template) {

		$exercise = ClassroomExercise::where('week', $week)->where('template', $template)->first();
		if ($exercise) {
			$questions = json_decode($exercise->questions, true);
		} else {
			$questions = [];
		}

		return view('admin.exercise-template-' . $template, ['week' => $week, 'template' => $template, 'questions' => $questions]);

	}

	function enableExercise() {
		$weeks = Week::orderBy('week', 'asc')->get();
		return view('admin.exercise-enable', ['weeks' => $weeks]);
	}

	function article() {
		$articles = Article::where('enable', 1)->orderBy('published_at', 'desc')->get();
		return view('admin.article', ['articles' => $articles]);
	}

	function articleCreate() {
		return view('admin.article-create');
	}

	function articleEdit($id) {
		$article = Article::find($id);
		return view('admin.article-edit', ['article' => $article]);
	}

	function popQuiz() {
		$weeks = Week::orderBy('week', 'asc')->get();
		return view('admin.pop-quiz-setting', [
			'weeks' => $weeks,
		]);
	}

	function popQuizWeek($week) {
		$quizs = PopQuiz::where('week', $week)->orderBy('week', 'asc')
		                                      ->select("id", "week", "question", "option1", "option2", "option3", "answer")->get();
		return view('admin.pop-quiz-week', [
			'week' => $week,
			'quizs' => $quizs,
		]);
	}

	function enablePopQuiz() {
		$weeks = Week::orderBy('week', 'asc')->get();
		return view('admin.pop-quiz-enable', ['weeks' => $weeks]);
	}

	function askHenry() {
		return view('admin.ask-henry');
	}

	function askHenryReply($id) {
		$question = AskHenry::find($id);
		if (!$question) {return redirect('/admin/ask-henry');}

		return view('admin.ask-henry-reply', ['question' => $question]);
	}

	function trailerImage() {
		$trailers = VideoTrailerEn::orderBy('week', 'asc')->get();
		return view('admin.trailer-image', ['trailers' => $trailers]);
	}

	function trailerImageDetailEn() {
		$trailerEn = VideoTrailerEn::orderBy('week', 'asc')->get();

		return view('admin.trailer-image-detail-en', [
			'trailerEn' => $trailerEn,
		]);
	}

	function trailerImageDetailMs() {
		$trailerMs = VideoTrailerMs::orderBy('week', 'asc')->get();

		return view('admin.trailer-image-detail-ms', [
			'trailerMs' => $trailerMs,
		]);
	}

	function homeBanner() {
		$banners = HomeBanner::where('enable', 1)->get();
		return view('admin.home-banner', ['banners' => $banners]);
	}

	function homeBannerCreate() {
		return view('admin.home-banner-create');
	}

	function homeBannerEdit() {
		$id =  Request::input("id" , '0');

		$banners = HomeBanner::find($id);
		return view('admin.home-banner-edit', ['banners' => $banners]);
	}

	function meet() {
		$id =  Request::input("id" , "1");

		$meet = MeetCharacters::find($id);
		return view('admin.meet-characters', ['meet' => $meet]);
	}

	function about() {
		$charactersEn = AboutCharacterEn::orderBy('id', 'asc')->get();
		$charactersMs = AboutCharacterMs::orderBy('id', 'asc')->get();

		return view('admin.about-characters', [
			'charactersEn' => $charactersEn,
			'charactersMs' => $charactersMs,
		]);
	}

	function aboutEdit() {
		$id =  Request::input("id" , '');

		$charactersEn = AboutCharacterEn::find($id);
		$charactersMs = AboutCharacterMs::find($id);
		$banners = HomeBanner::find($id);

		return view('admin.about-characters-edit', [
			'charactersEn' => $charactersEn,
			'charactersMs' => $charactersMs,
		]);
	}

}
