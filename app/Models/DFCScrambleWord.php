<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class DFCScrambleWord extends Eloquent {
	use SoftDeletes;

	public $table = 't0137_dfc_scramblewords';
	protected $primaryKey = 'id';
	public $timestamps = true;
	protected $dates = ['deleted_at'];

}
