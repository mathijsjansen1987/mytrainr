<?php

namespace App\Http\Controllers\coach;
use Auth;
use App\Group;
use App\User;
use App\Sport;
use App\Location;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

		$view = view('groups.index');
		$view->groups = $user->groups;
		return $view;
	}

	public function get_view($id)
	{
		$group = Group::find($id);

		$view = view('groups.view');
		$view->group = $group;
		$view->users = $group->users;

		return $view;
	}

	public function get_add()
	{
		$view = view('groups.add');
		$view->group = new Group;
		$view->users = User::all()->lists('name','id');
		$view->sports = Sport::lists('name','id');
		$view->locations = Location::lists('name','id');

		return $view;
	}

	public function get_edit($id)
	{
		$view = view('groups.edit');
		$view->group = Group::find($id);
		$view->users = User::all()->lists('name','id');
		$view->sports = Sport::lists('name','id');
		$view->locations = Location::lists('name','id');

		return $view;
	}

	public function store(Request $request){

		$input = $request->input();
		$group = new Group();
		$group->name = $input['name'];
		$group->description = $input['description'];
		$group->coach_id = Auth::user()->id;
		$group->save();

		$group->users()->sync($input['users']);
		$group->sports()->sync($input['sports']);

		return redirect()->route('groups.index');
	}


	public function update(Request $request, $id){

		$input = $request->input();

		$group = Group::find($id);
		$group->name = $input['name'];
		$group->description = $input['description'];
		$group->save();

		$group->users()->sync($input['users']);
		$group->sports()->sync($input['sports']);

		return redirect()->route('groups.index');
	}



	public function destroy(Request $request,$id){

		$group = Group::find($id);
		$group->users()->detach($group->users);
		$group->delete();

		return redirect()->route('groups.index');
	}


}
