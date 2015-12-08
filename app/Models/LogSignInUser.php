<?php namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class LogSignInUser extends Eloquent {

	protected $table = 't9406_log_signin_user';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $hidden = [];

}