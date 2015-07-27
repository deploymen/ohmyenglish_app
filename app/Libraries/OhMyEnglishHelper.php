<?php namespace App\Libraries;

use App;
use App\Models\AboutCharacterEn;
use App\Models\AboutCharacterMs;
use App\Models\Article;
use App\Models\VideoTrailerEn;
use App\Models\VideoTrailerMs;
use App\Models\Week;

class OhMyEnglishHelper {

	public static function GetCharacterByUrlName($urlName) {
		switch (App::getLocale()) {
			case 'en':return AboutCharacterEn::find($urlName);
			case 'ms':return AboutCharacterMs::find($urlName);
		}
	}

	//
	public static function GetAllTrailers() {
		switch (App::getLocale()) {
			case 'en':return VideoTrailerEn::orderBy('week', 'asc')->select('week', 'url_name', 'enable')->get();
			case 'ms':return VideoTrailerMs::orderBy('week', 'asc')->select('week', 'url_name', 'enable')->get();
		}
	}

	public static function GetTrailerByLatest() {
		switch (App::getLocale()) {
			case 'en':return VideoTrailerEn::where('enable', 1)->orderBy('week', 'desc')->first();
			case 'ms':return VideoTrailerMs::where('enable', 1)->orderBy('week', 'desc')->first();
		}
	}

	public static function GetTrailerByWeek($week) {
		switch (App::getLocale()) {
			case 'en':return VideoTrailerEn::where('week', $week)->first();
			case 'ms':return VideoTrailerMs::where('week', $week)->first();
		}
	}

	public static function GetTrailerByUrlName($urlName) {
		switch (App::getLocale()) {
			case 'en':return VideoTrailerEn::where('url_name', $urlName)->first();
			case 'ms':return VideoTrailerMs::where('url_name', $urlName)->first();
		}
	}

	public static function GetTrailerUrlNames() {
		$names = [];
		switch (App::getLocale()) {
			case 'en':$trailer = VideoTrailerEn::select('url_name')->get();
				break;
			case 'ms':$trailer = VideoTrailerMs::select('url_name')->get();
				break;
		}

		for ($i = 0; $i < count($trailer); $i++) {
			array_push($names, $trailer[$i]->url_name);
		}

		return '(' . implode('|', $names) . ')';
	}

	public static function GetArticleUrlNames() {
		$names = [];
		$articles = Article::select('url_slug')->get();

		for ($i = 0; $i < count($articles); $i++) {
			array_push($names, $articles[$i]->url_slug);
		}

		return '(' . implode('|', $names) . ')';
	}

	//
	public static function GetLatestExerciseWeek() {
		return Week::where('enable', 1)->orderBy('week', 'desc')->first()->week;
	}

}