<?php namespace App\Http\Controllers;

use App;
use App\Models\Article;
use App\Models\AskHenry;
use App\Models\ClassroomExercise;
use App\Models\PopQuiz;
use App\Models\VideoTrailerEn;
use App\Models\Week;
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

	function askHenry() {
		return view('admin.ask-henry');
	}

	function askHenryReply($id) {
		$question = AskHenry::find($id);
		if (!$question) {return redirect('/admin/ask-henry');}

		return view('admin.ask-henry-reply', ['question' => $question]);
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

	function trailerImage() {
		$trailers = VideoTrailerEn::orderBy('week', 'asc')->get();
		return view('admin.trailer-image', ['trailers' => $trailers]);
	}

}
