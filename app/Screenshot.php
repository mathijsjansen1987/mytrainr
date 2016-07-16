<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    protected $fillable = [
       'fullPath','frame_id'
    ];
}
