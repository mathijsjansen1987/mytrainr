<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    protected $fillable = [
       'phase_id','analysis_id'
    ];
}
