<?php

Route::get('/admin', function () {return Redirect::to('/admin/sign-in');});

Route::group(['prefix' => '/admin'], function () {
	Route::get('/sign-in', function () {

		return view('admin.sign-in');

	});

	Route::group(['middleware' => 'auth.admin'], function () {
		Route::get('/', function () {return view('admin.index');});

		//classroom-exercise
		Route::get('/classroom-exercise', function () {return view('admin.classroom-exercise');});
		Route::group(['prefix' => '/weeks'], function () {
			Route::get('/', 'AdminPageController@weekList');
			Route::get('/{week}', function ($week) {return view('admin.exercise-week', ['week' => $week]);});
			Route::get('/{week}/templates/{template}', 'AdminPageController@exerciseTemplate');
		});

		//video-trailer
		Route::group(['prefix' => '/video-trailer'], function () {
			Route::get('/en', function () {return view('admin.video-trailer-en');});
			Route::get('/ms', function () {return view('admin.video-trailer-ms');});
		});

		//pop-quiz
		Route::group(['prefix' => '/pop-quiz'], function () {
			Route::get('/', 'AdminPageController@popQuiz');
			Route::get('/{week}', 'AdminPageController@popQuizWeek');

		});

		Route::group(['prefix' => '/ask-henry'], function () {
			Route::get('/', 'AdminPageController@askHenry');
			Route::get('/reply/questions/{id}', 'AdminPageController@askHenryReply');
		});

		Route::group(['prefix' => '/articles'], function () {
			Route::get('/', 'AdminPageController@article');
			Route::get('/create', 'AdminPageController@articleCreate');
			Route::get('/{id}/edit', 'AdminPageController@articleEdit');
		});

		Route::group(['prefix' => '/trailer-image'], function () {
			Route::get('/', 'AdminPageController@trailerImage');
		});

	});
});