<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
	protected $fillable = [
		'frame_id','type','position','dimensions','color','fullPath'
	];
}
