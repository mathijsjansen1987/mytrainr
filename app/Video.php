<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Video extends Model
{

	protected $fillable = [
		'location_id', 'sport_id', 'record_device_id','cover','cloud_fullPath','local_fullPath','cloud_synced'
	];


	public function analyses()
	{
		return $this->hasMany('App\Analyse');
	}

	public function location()
	{
		return $this->belongsTo('App\Location');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'sporter_id', 'id');
	}

}
