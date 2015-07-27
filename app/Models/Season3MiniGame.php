<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Season3MiniGame extends Eloquent {

	public $table = 't0301_characterminigamesall';
	protected $primaryKey = 'charminiID';
	public $timestamps = false;

	protected $hidden = [];

}