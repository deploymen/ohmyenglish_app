<?php namespace App\Http\Controllers;

use App;
use App\Libraries\OhMyEnglishHelper;
use App\Models\Article;
use App\Models\AskHenry;
use App\Models\ClassroomExercise;
use App\Models\DFCScrambleWord;
use App\Models\HomeBanner;
use App\Models\MeetCharacters;
use App\Models\PersonalityQuizQuestion;
use App\Models\PopQuiz;
use App\Models\VideoTrailerEn;
use App\Models\VideoTrailerMs;
use App\Models\Week;
use Mcamara\LaravelLocalization;
use Request;
use View;

Class PageController extends Controller {

	public function __construct() {

		View::share('withSkinner', ''); //withSkinner2 or empty
		View::share('displayLbBanner', 1);
		View::share('displayLeftSkinner', 1);
		View::share('displayRightSkinner', 1);
		View::share('lang', App::getLocale());

	}

	public function _testTwitter() {
		return view('_test-twitter', [
			'url' => '',
			'title' => 'Test Twitter',
			'switch_en' => '',
			'switch_ms' => '',
		]);
	}

	public function home() {
		$lang = App::getLocale();

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.home');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.home');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.home');

		$trailer = OhMyEnglishHelper::GetTrailerByLatest();
		$trailerUrl = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.about_trailers_each', ['episode' => $trailer->url_name]);

		$exerciseWeek = OhMyEnglishHelper::GetLatestExerciseWeek();
		$popQuizs = PopQuiz::where('week', $exerciseWeek)->where('enable', 1)->select("id", "week", "question", "option1", "option2", "option3", "answer")->get();

		$popQuizsPrevWeekUrl = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_pop_quiz_each', ['week' => ($exerciseWeek > 1) ? $exerciseWeek : 1]);
		$askHenry = AskHenry::where('status', 'approved')->orderBy('answered_at', 'desc')->first();
		$askHenryUrl = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_ask_henry');

		$articles = Article::where('enable', 1)->orderBy('published_at', 'desc')->select('title', 'url_slug', 'share_' . App::getLocale() . ' AS share_desc', 'content')->take(3)->get();
		for ($i = 0; $i < count($articles); $i++) {
			$articles[$i]['url'] = \LaravelLocalization::getURLFromRouteNameTranslated(\LaravelLocalization::getCurrentLocale(), 'routes.learn_article_each', ['slug' => $articles[$i]['url_slug']]);
		}

		$banners = HomeBanner::where('enable', 1)->get();

		$meetCharacters = MeetCharacters::all();

		return view('home', [
			'url' => $url,
			'title' => trans('home.title'),
			'trailer' => $trailer,
			'trailerUrl' => $trailerUrl,
			'exerciseWeek' => $exerciseWeek,
			'popQuizs' => $popQuizs,
			'popQuizsPrevWeekUrl' => $popQuizsPrevWeekUrl,
			'askHenry' => $askHenry,
			'askHenryUrl' => $askHenryUrl,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'articles' => $articles,
			'banners' => $banners,
			'meetCharacters' => $meetCharacters,
		]);

	}

	public function aboutCharacters() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.about_characters');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.about_characters');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.about_characters');

		return view('about', [
			'url' => $url,
			'title' => trans('about.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function aboutShow() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.about_show');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.about_show');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.about_show');

		return view('about-show', [
			'url' => $url,
			'title' => trans('about-show.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function aboutTrailerDefault() {

		$language = App::getLocale();
		$curWeek = VideoTrailerEn::where('enable', 1)->max('week');

		$trailer = OhMyEnglishHelper::GetTrailerByWeek($curWeek);
		$url = \LaravelLocalization::getURLFromRouteNameTranslated(\LaravelLocalization::getCurrentLocale(), 'routes.about_trailers_each', ['episode' => $trailer->url_name]);

		return redirect($url);
	}

	public function aboutTrailerEach($episode) {
		$language = App::getLocale();

		$trailer = OhMyEnglishHelper::GetTrailerByUrlName($episode);

		$trailerEn = VideoTrailerEn::find($trailer->id);
		$trailerMs = VideoTrailerMs::find($trailer->id);
		$url = \LaravelLocalization::getURLFromRouteNameTranslated(false, 'routes.about_trailers_each', ['episode' => $trailer->url_name]);
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.about_trailers_each', ['episode' => $trailerEn->url_name]);
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.about_trailers_each', ['episode' => $trailerMs->url_name]);

		$trailerAvailable = OhMyEnglishHelper::GetAllTrailers();

		$trailerTitle = "trailer_meta_title_{$language}";
		return view('about-trailer', [
			'url' => $url,
			'title' => $trailer->meta_title,
			'trailer' => $trailer,
			'trailerEn' => $trailerEn,
			'trailerAvailable' => $trailerAvailable,
			'curWeek' => $trailer->week,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function aboutCharactersEach($character) {

		$characters = [
			'henry-middleton',
			'jibam',
			'see-yew-soon',
			'taylor-marie-smith',
			'zack',
			'cikgu-ayu',
			'mazlee',
			'anusha',
			'jojie',
			'sarjan-bin-mejar',
			'cikgu-bedah',
			'bella',
			'zeeq',
			'sayur',
			'qila',
			'puan-aida',
			'cik-soo',
			'encik-ariff',
		];

		$index = 0;
		for ($i = 0; $i < count($characters); $i++) {
			if ($characters[$i] == $character) {
				$index = $i;
				break;
			}
		}

		$indexPrev = $index - 1 + count($characters);
		$indexPrev %= count($characters);
		$indexNext = $index + 1 + count($characters);
		$indexNext %= count($characters);

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.about_characters_each', ['character' => $character]);
		$prevCharUrl = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.about_characters_each', ['character' => $characters[$indexPrev]]);
		$nextCharUrl = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.about_characters_each', ['character' => $characters[$indexNext]]);

		$character = OhMyEnglishHelper::GetCharacterByUrlName($character);

		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.about_characters_each', ['character' => $character->id]);
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.about_characters_each', ['character' => $character->id]);

		return view('about-inner', [
			'url' => $url,
			'title' => trans('character-' . $character->id . '.meta_title'),
			'character' => $character,
			'charFile' => "character-" . $character->id,
			'prevCharUrl' => $prevCharUrl,
			'nextCharUrl' => $nextCharUrl,

			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,

		]);

	}

	public function learnExerciseDefault() {
		$curWeek = Week::where('enable', 1)->max('week');
		return redirect(\LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_exercise_each', ['week' => $curWeek]));
	}

	public function learnExercise($week) {

		$lang = App::getLocale();

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_exercise_each', ['week' => $week]);
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_exercise_each', ['week' => $week]);
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_exercise_each', ['week' => $week]);

		$mExercises = ClassroomExercise::where('week', $week)->where('enable', 1)->orderBy('template', 'asc')->get();

		$exercises = [];
		for ($i = 0; $i < $mExercises->count(); $i++) {
			$exercise = $mExercises[$i];

			array_push($exercises, [
				'template' => $exercise->template,
				'questions' => json_decode($exercise->questions),
			]);
		}

		//randomize exercises
		shuffle($exercises);

		$weeksAvailable = [];
		$weeks = Week::orderBy('week', 'asc')->select('week', 'enable')->get();

		return view('learn-exercise', [
			'url' => url($url),
			'title' => trans('learn-exercise.meta_title', ['week' => $week]),
			'weeksAvailable' => $weeks,
			'curWeek' => $week,
			'exercises' => $exercises,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function learnAskHenry() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_ask_henry');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_ask_henry');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_ask_henry');

		return view('ask-henry', [
			'url' => $url,
			'title' => trans('ask-henry.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'reply' => null,
		]);

	}

	public function learnAskHenryEach($id) {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_ask_henry_each', ['id' => $id]);
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_ask_henry_each', ['id' => $id]);
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_ask_henry_each', ['id' => $id]);

		$reply = AskHenry::where('id', $id)->where('status', 'approved')->first();
		if (!$reply) {
			return redirect(\LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_ask_henry'));
		}

		return view('ask-henry', [
			'url' => $url,
			'title' => trans('ask-henry.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'reply' => $reply,
		]);

	}

	public function learnPopQuizDefault() {

		$curWeek = Week::where('enable', 1)->max('week');
		return redirect(\LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_pop_quiz_each', ['week' => $curWeek]));

	}

	public function learnPopQuiz($week) {
		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_pop_quiz_each', ['week' => $week]);
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_pop_quiz_each', ['week' => $week]);
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_pop_quiz_each', ['week' => $week]);

		$popQuizs = PopQuiz::where('week', $week)->where('enable', 1)->select("id", "week", "question", "option1", "option2", "option3", "answer")->get();

		$weeksAvailable = [];
		$weeks = Week::orderBy('week', 'asc')->select('week', 'enable')->get();
		return view('pop-quiz', [
			'url' => $url,
			'title' => trans('pop-quiz.title', ['week' => $week]),
			'weeksAvailable' => $weeks,
			'curWeek' => $week,
			'popQuizs' => $popQuizs,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function learnArticle() {
		$pageSize = 8;

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_article');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_article');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_article');

		$articles = Article::where('enable', 1)->orderBy('published_at', 'desc')->select('title', 'url_slug', 'content', 'published_at')->take($pageSize)->get();

		$urlEachBase = \LaravelLocalization::getURLFromRouteNameTranslated(\LaravelLocalization::getCurrentLocale(), 'routes.learn_article_each', ['slug' => '']);

		return view('learn-article', [
			'url' => $url,
			'title' => trans('learn-article.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'articles' => $articles,
			'urlEachBase' => $urlEachBase,
		]);

	}

	public function learnArticleEach($slug) {

		$maxArticlesMayLike = 3;

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_article_each', ['slug' => $slug]);
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_article_each', ['slug' => $slug]);
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_article_each', ['slug' => $slug]);

		if (Request::input('preview')) {
			$articles = Article::orderBy('published_at', 'desc')->select('title', 'url_slug', 'content', 'published_at')->get();
			$article = Article::where('url_slug', $slug)->select('title', 'url_slug', 'content', 'share_' . App::getLocale() . ' AS share_desc', 'published_at', 'meta_title', 'meta_description')->first();
		} else {
			$articles = Article::where('enable', 1)->orderBy('published_at', 'desc')->select('title', 'url_slug', 'content', 'published_at')->get();
			$article = Article::where('url_slug', $slug)->where('enable', 1)->select('title', 'url_slug', 'content', 'share_' . App::getLocale() . ' AS share_desc', 'published_at', 'meta_title', 'meta_description')->first();
		}
		if (!$article) {die('article not found');}

		$urlEachBase = \LaravelLocalization::getURLFromRouteNameTranslated(\LaravelLocalization::getCurrentLocale(), 'routes.learn_article_each', ['slug' => '']);

		$articlesMayLike = [];

		$urlList = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_article');
		$totalArticle = count($articles);
		for ($i = 0; $i < $totalArticle; $i++) {
			$a = $articles[$i];
			if ($a->url_slug == $slug) {
				$prevArticleUrl = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_article_each', ['slug' => $articles[($i + $totalArticle - 1) % $totalArticle]->url_slug]);
				$nextArticleUrl = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_article_each', ['slug' => $articles[($i + $totalArticle + 1) % $totalArticle]->url_slug]);
			}
		}

		for ($i = 0; $i < $totalArticle; $i++) {
			$a = $articles[$i];
			if ($a->url_slug == $slug) {
				for ($j = 0; $j < $totalArticle - 1 && $j < $maxArticlesMayLike; $j++) {
					array_push($articlesMayLike, $articles[($i + $totalArticle + $j + 1) % $totalArticle]);
				}
			}
		}

		$longUrl = $url;
		$bitLyRes = file_get_contents("http://api.bit.ly/v3/shorten?login=o_2s73ljvg77&apiKey=R_bf8c8ac772ed496eb1a3061dc4828b5e&longUrl=" . urlencode($longUrl) . "&format=json");
		$bitLyRes = json_decode($bitLyRes, true);
		$shortUrl = $bitLyRes['data']['url'];

		return view('learn-article-each', [
			'url' => $url,
			'shortUrl' => $shortUrl,
			'title' => $article->meta_title . ' | ' . trans('learn-article.meta_title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'urlList' => $urlList,
			'prevArticleUrl' => $prevArticleUrl,
			'nextArticleUrl' => $nextArticleUrl,
			'articlesMayLike' => $articlesMayLike,
			'urlEachBase' => $urlEachBase,
			'article' => $article,
		]);

	}

	public function learnGenericQuiz() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_generic_quiz');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_generic_quiz');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_generic_quiz');

		$urlQuiz1 = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_generic_quiz_each', ['quiz' => "how-malaysian-is-your-english"]);
		$urlQuiz2 = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_generic_quiz_each', ['quiz' => "which-english-words-describes-you"]);
		$urlQuiz3 = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_generic_quiz_each', ['quiz' => "which-character-are-you"]);

		return view('learn-generic-quiz', [
			'url' => $url,
			'title' => trans('learn-generic-quiz.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'urlQuiz1' => $urlQuiz1,
			'urlQuiz2' => $urlQuiz2,
			'urlQuiz3' => $urlQuiz3,
		]);

	}

	public function learnGenericQuizEach($quiz) {
		$result = Request::input("result", 0);

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_generic_quiz_each', ['quiz' => $quiz]);
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.learn_generic_quiz_each', ['quiz' => $quiz]);
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.learn_generic_quiz_each', ['quiz' => $quiz]);

		$urlIndex = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.learn_generic_quiz');

		$questions = PersonalityQuizQuestion::where('type', $quiz)->orderBy('id', 'asc')->select('question', 'option1', 'option2', 'option3')->get();
		switch ($quiz) {
			case 'how-malaysian-is-your-english':$quizIndex = 1;
				break;
			case 'which-english-words-describes-you':$quizIndex = 2;
				break;
			case 'which-character-are-you':$quizIndex = 3;
				break;
		}

		$metaTitle = trans("learn-generic-quiz.quiz" . $quizIndex . "_meta_title");
		$metaDescription = trans("learn-generic-quiz.quiz" . $quizIndex . "_meta_description");

		if ($result > 0) {
			$ogTitle = trans("learn-generic-quiz.quiz" . $quizIndex . "_result" . $result . "_share_title");
			$ogUrl = $url . '?result=' . $result;
			$ogImage = url('assets/images/share/gen-quiz/' . $quizIndex . '/' . App::getLocale() . '/' . $result . '.jpg');
			$ogDescription = trans("learn-generic-quiz.quiz" . $quizIndex . "_info");
		} else {
			$ogTitle = trans("learn-generic-quiz.quiz" . $quizIndex . "_meta_title");
			$ogUrl = $url;
			$ogImage = url('assets/images/share/share-rectangle.png');
			$ogDescription = trans("learn-generic-quiz.quiz" . $quizIndex . "_meta_description");
		}

		$longUrl = $url;
		$bitLyRes = file_get_contents("http://api.bit.ly/v3/shorten?login=o_2s73ljvg77&apiKey=R_bf8c8ac772ed496eb1a3061dc4828b5e&longUrl=" . urlencode($longUrl) . "&format=json");
		$bitLyRes = json_decode($bitLyRes, true);
		$shortUrl = $bitLyRes['data']['url'];

		return view('learn-generic-quiz-each', [
			'url' => $url,
			'shortUrl' => $shortUrl,
			'title' => $metaTitle,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'urlIndex' => $urlIndex,
			'quiz' => $quiz,
			'quizIndex' => $quizIndex,
			'questions' => $questions,

			'metaDescription' => $metaDescription,
			'ogTitle' => $ogTitle,
			'ogUrl' => $ogUrl,
			'ogImage' => $ogImage,
			'ogDescription' => $ogDescription,

		]);

	}

	public function playFeedHenry() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.play_feed_henry');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.play_feed_henry');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.play_feed_henry');

		return view('play-feed-henry', [
			'url' => $url,
			'title' => trans('play-feed-henry.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function playSpyLeader() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.play_spy_leader');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.play_spy_leader');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.play_spy_leader');

		return view('play-spy-leader', [
			'url' => $url,
			'title' => trans('play-spy-leader.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function playFootballFever() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.play_football_fever');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.play_football_fever');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.play_football_fever');

		return view('play-football-fever', [
			'url' => $url,
			'title' => trans('play-football-fever.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function playSuperTyper() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.play_super_typer');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.play_super_typer');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.play_super_typer');

		return view('play-super-typer', [
			'url' => $url,
			'title' => trans('play-super-typer.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function playProtectPrincess() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.play_protect_princess');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.play_protect_princess');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.play_protect_princess');

		return view('play-protect-princess', [
			'url' => $url,
			'title' => trans('play-protect-princess.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function playDashCoin() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.play_dash_coin');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.play_dash_coin');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.play_dash_coin');

		$scrambleWords = DFCScrambleWord::select('word', 'hint')->get();
		return view('play-dash-coin', [
			'url' => $url,
			'title' => trans('play-dash-coin.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
			'scrambleWords' => $scrambleWords,
		]);
	}

	public function social() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.social_buzz');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.social_buzz');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.social_buzz');

		return view('social-buzz', [
			'url' => $url,
			'title' => trans('social.title'),
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	public function sto() {

		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.sto');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.sto');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.sto');

		return view('sto', [
			'url' => $url,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	function ohMyGoat() {
		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.oh_my_goat');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.oh_my_goat');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.oh_my_goat');

		return view('oh-my-goat', [
			'url' => $url,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

	function ohMyGoatBlank() {
		$url = \LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), 'routes.oh_my_goat_blank');
		$switchEn = \LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.oh_my_goat_blank');
		$switchMs = \LaravelLocalization::getURLFromRouteNameTranslated('ms', 'routes.oh_my_goat_blank');

		return view('oh-my-goat-blank', [
			'url' => $url,
			'switch_en' => $switchEn,
			'switch_ms' => $switchMs,
		]);
	}

}
