<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{

	  use EntrustUserTrait;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function videos()
	{
		return $this->hasMany('App\Video', 'sporter_id', 'id');
	}

	public function groups()
	{
		return $this->hasMany('App\Group','coach_id');
	}
}
