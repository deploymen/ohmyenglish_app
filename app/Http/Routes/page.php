<?php
use App\Libraries\OhMyEnglishHelper;

Route::get('/', function () {
	return redirect('/ms/utama');
});

Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => ['localeSessionRedirect', 'localizationRedirect'],
], function () {

	Route::get(LaravelLocalization::transRoute('routes.home'), ['as' => 'home', 'uses' => 'PageController@home']);

	Route::get(LaravelLocalization::transRoute('routes.about_characters'), ['as' => 'about_characters', 'uses' => 'PageController@aboutCharacters']);
	Route::get(LaravelLocalization::transRoute('routes.about_characters_each'), ['as' => 'about_characters_each', 'uses' => 'PageController@aboutCharactersEach'])
	->where('character', '(henry-middleton|jibam|see-yew-soon|taylor-marie-smith|zack|cikgu-ayu|mazlee|anusha|jojie|sarjan-bin-mejar|cikgu-bedah|bella|zeeq|sayur|qila|puan-aida|cik-soo|encik-ariff)');
	Route::get(LaravelLocalization::transRoute('routes.about_show'), ['as' => 'about_show', 'uses' => 'PageController@aboutShow']);
	Route::get(LaravelLocalization::transRoute('routes.about_trailers'), ['as' => 'about_trailers', 'uses' => 'PageController@aboutTrailerDefault']);
	Route::get(LaravelLocalization::transRoute('routes.about_trailers_each'), ['as' => 'about_trailers_each', 'uses' => 'PageController@aboutTrailerEach'])->where('episode', OhMyEnglishHelper::GetTrailerUrlNames());

	Route::get(LaravelLocalization::transRoute('routes.learn_exercise'), ['as' => 'learn_exercise', 'uses' => 'PageController@learnExerciseDefault']);
	Route::get(LaravelLocalization::transRoute('routes.learn_exercise_each'), ['as' => 'learn_exercise_each', 'uses' => 'PageController@learnExercise'])->where('week', '\d+');
	Route::get(LaravelLocalization::transRoute('routes.learn_ask_henry'), ['as' => 'ask_henry', 'uses' => 'PageController@learnAskHenry']);
	Route::get(LaravelLocalization::transRoute('routes.learn_ask_henry_each'), ['as' => 'ask_henry_each', 'uses' => 'PageController@learnAskHenryEach']);
	Route::get(LaravelLocalization::transRoute('routes.learn_pop_quiz'), ['as' => 'pop_quiz', 'uses' => 'PageController@learnPopQuizDefault']);
	Route::get(LaravelLocalization::transRoute('routes.learn_pop_quiz_each'), ['as' => 'pop_quiz_each', 'uses' => 'PageController@learnPopQuiz'])->where('week', '\d+');
	Route::get(LaravelLocalization::transRoute('routes.learn_article'), ['as' => 'learn_article', 'uses' => 'PageController@learnArticle']);
	Route::get(LaravelLocalization::transRoute('routes.learn_article_each'), ['as' => 'learn_article_each', 'uses' => 'PageController@learnArticleEach'])->where('slug', OhMyEnglishHelper::GetArticleUrlNames());
	Route::get(LaravelLocalization::transRoute('routes.learn_generic_quiz'), ['as' => 'learn_generic_quiz', 'uses' => 'PageController@learnGenericQuiz']);
	Route::get(LaravelLocalization::transRoute('routes.learn_generic_quiz_each'), ['as' => 'learn_generic_quiz_each', 'uses' => 'PageController@learnGenericQuizEach'])
	->where('quiz', '(how-malaysian-is-your-english|which-english-words-describes-you|which-character-are-you)');

	Route::get(LaravelLocalization::transRoute('routes.play_feed_henry'), ['as' => 'play_feed_henry', 'uses' => 'PageController@playFeedHenry']);
	Route::get(LaravelLocalization::transRoute('routes.play_spy_leader'), ['as' => 'play_spy_leader', 'uses' => 'PageController@playSpyLeader']);
	Route::get(LaravelLocalization::transRoute('routes.play_football_fever'), ['as' => 'play_football_fever', 'uses' => 'PageController@playFootballFever']);
	Route::get(LaravelLocalization::transRoute('routes.play_super_typer'), ['as' => 'play_super_typer', 'uses' => 'PageController@playSuperTyper']);
	Route::get(LaravelLocalization::transRoute('routes.play_protect_princess'), ['as' => 'play_protect_princess', 'uses' => 'PageController@playProtectPrincess']);
	Route::get(LaravelLocalization::transRoute('routes.play_dash_coin'), ['as' => 'play_dash_coin', 'uses' => 'PageController@playDashCoin']);

	Route::get(LaravelLocalization::transRoute('routes.social_buzz'), ['as' => 'social_buzz', 'uses' => 'PageController@social']);

	Route::get(LaravelLocalization::transRoute('routes.sto'), ['as' => 'sto', 'uses' => 'PageController@sto']);

	Route::get(LaravelLocalization::transRoute('routes.oh_my_goat'), ['as' => 'oh_my_goat', 'uses' => 'PageController@ohMyGoat']);
	Route::get(LaravelLocalization::transRoute('routes.oh_my_goat_blank'), ['as' => 'oh_my_goat_blank', 'uses' => 'PageController@ohMyGoatBlank']);

});
