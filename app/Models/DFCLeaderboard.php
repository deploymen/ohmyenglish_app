<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class DFCLeaderboard extends Eloquent {
	use SoftDeletes;

	public $table = 't0138_dfc_leaderboard';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $dates = ['deleted_at'];

}
