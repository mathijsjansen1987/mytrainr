<?php

namespace App\Http\Controllers;
use Auth;
use App\Group;
use App\Http\Requests;
use Illuminate\Http\Request;

class GroupController extends Controller
{

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$user = Auth::user();

		$groups = $user->groups;

		$view = view('groups');
		$view->groups = $groups;
		return $view;
	}

	public function detail($id)
	{
		$view = view('groupdetail');
		$view->group = Group::find($id);
		return $view;
	}
}
