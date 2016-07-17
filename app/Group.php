<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = [
		'sport_id','name','sporters'
	];


	public function sport()
	{
		return $this->belongsTo('App\Sport');
	}

	public function users()
	{
		return $this->belongsToMany('App\User','group_user','group_id','user_id');
	}

}
