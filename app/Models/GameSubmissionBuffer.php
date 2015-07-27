<?php namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameSubmission extends Eloquent{
	use SoftDeletes;

	public $table = 't0124_game_submission';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $dates = ['deleted_at'];

}

