<?php

namespace App\Http\Controllers;
use Auth;
use App\Group;
use App\Sport;
use App\Location;
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

		$view = view('groups.overview');
		$view->groups = $groups;
		return $view;
	}

	public function detail($id)
	{

		$group = Group::find($id);

		$view = view('groups.detail');
		$view->group = $group;
		$view->users = $group->users;

		return $view;
	}

	public function get_add()
	{
		$view = view('groups.add');
		$view->group = new Group;
		$view->sports = Sport::lists('name','id');
		$view->locations = Location::lists('name','id');
		return $view;
	}

	public function store(Request $request){

		$input = $request->input();

		$group = new Group();
		$group->name = $input['name'];
		$group->sport_id = $input['sport'];
		$group->coach_id = Auth::user()->id;
		$group->save();

		return redirect()->route('groups');

	}

	public function destroy(Request $request,$id){

		$group = Group::find($id);
		$group->delete();
		return redirect()->route('groups');
	}


}
