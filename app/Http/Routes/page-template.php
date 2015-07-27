<?php

/*Route::get('/hello', 'WelcomeController@index');*/

Route::get('/templates/seasons/navigation', function(){ return view('navigation'); });
Route::get('/templates/seasons/navigation-non-responsive', function(){ return view('navigation-non-responsive'); });