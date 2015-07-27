<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalityQuizQuestion extends Eloquent {
	use SoftDeletes;

	public $table = 't0139_personality_quiz_question';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $dates = ['deleted_at'];

}
