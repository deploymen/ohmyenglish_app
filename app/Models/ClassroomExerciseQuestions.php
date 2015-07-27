<?php namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ClassroomExerciseQuestions extends Eloquent{

	public $table = 't0132_classroom_exercise_questions';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $hidden = [];

}