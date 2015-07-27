<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Week extends Eloquent{

	public $table = 't0131_week';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $hidden = [];

}