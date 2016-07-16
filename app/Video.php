<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Video extends Model
{

	protected $fillable = [
		'location_id', 'sport_id', 'record_device_id','cover','cloud_fullPath','local_fullPath','cloud_synced'
	];

}
