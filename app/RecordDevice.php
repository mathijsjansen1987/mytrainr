<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordDevice extends Model
{
	protected $fillable = [
		'type','model','resolution'
	];
}
