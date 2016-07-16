<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
	protected $fillable = [
		'video_id'
	];

	public function video()
	{
		return $this->belongsTo('App\Video');
	}

}
