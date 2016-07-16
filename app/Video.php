<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id', 'sport_id', 'record_device_id','cover','cloud_fullPath','local_fullPath','cloud_synced'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
