<?php namespace App\Http\Controllers;

use App;
use App\Libraries\ResponseHelper;
use App\Models\PopQuiz;
use Exception;
use Request;

Class PopQuizController extends Controller {

	public function savePopQuizs($week) {
		$quizs = Request::input("quizs");

		if (!$quizs) {return ResponseHelper::OutputJSON('fail', 'missing questions data');}

		$quizs = json_decode($quizs, true);

		try {
			for ($i = 0; $i < count($quizs); $i++) {
				$quiz = $quizs[$i];
				$popQuiz = PopQuiz::find($quiz['id']);
				$popQuiz->question = $quiz['question'];
				$popQuiz->option1 = $quiz['option1'];
				$popQuiz->option2 = $quiz['option2'];
				$popQuiz->option3 = $quiz['option3'];
				$popQuiz->answer = $quiz['answer'];
				$popQuiz->save();
			}

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('exeption', 'unable to save data');
		}

		return ResponseHelper::OutputJSON('success');
	}

}
