<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
     protected $fillable = [
       'frame_id','drawing_id','type','content'
    ];
}
