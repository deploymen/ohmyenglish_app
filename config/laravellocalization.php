<?php

return [

	// Uncomment the languages that your site supports -	 or add new ones.
	// These are sorted by the native name, which is the order you might show them in a language selector.
	// Regional languages are sorted by their base languge, so "British English" sorts as "English, British"
	'supportedLocales' => [
		'ms'          => ['name' => 'Malay',                  'script' => 'Latn', 'native' => 'Bahasa Melayu'],
		'en'          => ['name' => 'English',                'script' => 'Latn', 'native' => 'English'],
		//'zh'          => ['name' => 'Chinese (Simplified)',   'script' => 'Hans', 'native' => '简体中文'],
		//'zh-Hant'     => ['name' => 'Chinese (Traditional)',  'script' => 'Hant', 'native' => '繁體中文'],
	],

	'useAcceptLanguageHeader' => true,
	'hideDefaultLocaleInURL' => false,

];
