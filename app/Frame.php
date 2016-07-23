<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
	protected $fillable = [
		'phase_id','analysis_id'
	];

	public function phase(){
		return $this->belongsTo('App\Phase');
	}

	public function note(){
		return $this->hasMany('App\Note');
	}


}
