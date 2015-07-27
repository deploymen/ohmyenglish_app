<?php namespace App\Http\Controllers;

use App;
use App\Libraries\ResponseHelper;
use App\Models\ClassroomExercise;
use App\Models\Week;
use Exception;

Class ClassroomExerciseController extends Controller {

	public function getWeeklyQuestions($week) {
		$exercises = ClassroomExercise::where('week', $week)->where('enable', 1)->orderBy('template', 'asc')->get();

		if (!$exercises || $exercises->count() < 3) {
			return ResponseHelper::OutputJSON('fail', 'exercises not found on week ' . $week);
		}

		$return = [];

		for ($i = 0; $i < $exercises->count(); $i++) {
			$exercise = $exercises[$i];

			array_push($return, [
				'template' => $exercise->template,
				'questions' => json_decode($exercise->questions),
			]);
		}

		return ResponseHelper::OutputJSON('success', '', [
			'exercises' => $return,
		]);

	}

	public function getWeeklyTemplateQuestions($week, $template) {
		$exercise = ClassroomExercise::where('week', $week)->where('template', $template)->first();
		if (!$exercise) {
			return ResponseHelper::OutputJSON('fail', 'exercises not found on week ' . $week . ', template ' . $template);
		}

		return ResponseHelper::OutputJSON('success', '', [
			'template' => $exercise->template,
			'questions' => json_decode($exercise->questions),
		]);
	}

	public function saveWeeklyTemplateQuestions($week, $template) {
		$questions = \Request::input("questions");

		if (!$questions) {return ResponseHelper::OutputJSON('fail', 'missing questions data');}

		try {
			$q = json_decode($questions, true);

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('fail', 'invalid questions data');
		}

		try {
			$exercise = ClassroomExercise::where('week', $week)->where('template', $template)->first();
			if (!$exercise) {
				$exercise = new ClassroomExercise;
				$exercise->week = $week;
				$exercise->template = $template;
			}

			$exercise->questions = $questions;
			$exercise->save();

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('exeption', 'unable to save data');
		}

		return ResponseHelper::OutputJSON('success');
	}

}
