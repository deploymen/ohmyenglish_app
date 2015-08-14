<?php

//Classroom Exercise
Route::group(['prefix' => '/api/learn/classroom-exercise'], function () {
	Route::get('weeks/{week}', 'ClassroomExerciseController@getWeeklyQuestions')->where('week', '\d+');
	Route::get('weeks/{week}/templates/{template}', 'ClassroomExerciseController@getWeeklyTemplateQuestions')->where('week', '\d+')->where('template', '\d+');
	Route::put('weeks/{week}/templates/{template}', 'ClassroomExerciseController@saveWeeklyTemplateQuestions')->where('week', '\d+')->where('template', '\d+');
});

//Article
Route::group(['prefix' => '/api/articles'], function () {
	Route::get('/list', 'ArticleController@get');
	Route::post('/', 'ArticleController@create'); //admin
	Route::post('/{id}', 'ArticleController@edit'); //admin
	Route::delete('/{id}', 'ArticleController@delete'); //admin
});

//Pop Quiz
Route::group(['prefix' => '/api/learn/pop-quiz'], function () {
	Route::put('weeks/{week}', 'PopQuizController@savePopQuizs')->where('week', '\d+');
});

//Enable week for Classroom Exercise & Pop Quiz
Route::group(['prefix' => '/api/enable'], function () {
	Route::put('/weeks', 'AdminController@weekEnable');
});

//Ask Henry
Route::group(['prefix' => '/api/learn/ask-henry'], function () {
	Route::get('/', 'AskHenryController@getQuestions');
	Route::post('/', 'AskHenryController@submitQuestion');
	Route::post('/questions/{id}/reply', 'AskHenryController@reply'); //admin
	Route::put('/questions/{id}', 'AskHenryController@setStatus'); //admin
});

//Trailer Image
Route::group(['prefix' => '/api/trailer-image'], function () {
	Route::post('/', 'TrailerImageController@create');
});

//Trailer Image Detail EN & MS
Route::put('api/admin/video-trailer', 'TrailerImageController@UpdateVideoTrailer');

//Home Banner
Route::group(['prefix' => '/api/home-banner'], function () {
	Route::get('/', 'HomeBannerController@get');
	Route::post('/create', 'HomeBannerController@banner');
	Route::post('/edit', 'HomeBannerController@banner');
	Route::delete('/{id}', 'HomeBannerController@delete');
});

//Home Characters
Route::group(['prefix' => '/api/home/meet-characters'], function () {
	Route::post('/', 'MeetCharactersController@edit');
});

//About Characters
Route::group(['prefix' => '/api/about-characters'], function () {
	Route::post('/', 'AboutCharactersController@updateCharacter');
});

//DFC
Route::group(['prefix' => '/api/play/dfc/leaderboard'], function () {
	Route::get('/', 'DFCController@getLeaderboard');
	Route::post('/', 'DFCController@updateTopscore');
});

//Social Buzz
Route::get('api/socialbuzz', 'SocialController@getSocialBuzzFeed');

Route::get('/api/learn/classroom-exercise/weeks/{week}', 'ClassroomExerciseController@getWeeklyQuestions');

Route::group(['prefix' => 'api/game'], function () {
	Route::get('/questions', 'GameController@getQuestions');
	Route::post('/submission', 'GameController@submitGamePlay');
	Route::get('/leaderboard', 'GameController@leaderboard');
});

Route::group(['prefix' => 'cron'], function () {
	Route::get('/crawl/social/facebook', 'SocialController@readPageFeedFacebook');
	Route::get('/crawl/social/twitter', 'SocialController@readPageFeedTwitter');
	Route::get('/crawl/social/instagram', 'SocialController@readPageFeedInstagram');

	Route::get('/update/socialbuzz', 'SocialController@cronCrawlForSocialBuzz');
});

Route::group(['prefix' => 'api/admin'], function () {
	Route::post('/sign-in', 'AdminController@signIn');
	Route::post('/sign-out', 'AdminController@signOut');
});

Route::group(['prefix' => 'api/season3/minigame'], function () {
	Route::post('/save-without-name', 'Season3GameController@save_withoutname_minigameleaderboard_forall');
	Route::post('/save-name', 'Season3GameController@save_minigameleaderboard_forall');
	Route::post('/leaderboard', 'Season3GameController@retrieve_minigamesleaderboard_forall');
});
