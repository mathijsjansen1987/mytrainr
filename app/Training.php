<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
	protected $fillable = [
		'location_id','group_id','days_of_the_week','time_from','time_till'
	];
}
