<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $primaryKey = 'pid';

	public $timestamps = false;  

	function user() {
		return $this->belongsTo("App\User");
	}  
}
