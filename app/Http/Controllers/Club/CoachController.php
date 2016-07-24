<?php

namespace App\Http\Controllers\Club;
use Auth;
use App\Group;
use App\User;
use App\Role;
use App\Sport;
use App\Location;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoachController extends Controller
{

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$user = Auth::user();

		$view = view('coaches.index');
		$view->coaches = Role::where('name', 'coach');
		return $view;
	}

	public function get_view($id)
	{
		$sport = Sport::find($id);

		$view = view('sports.view');
		$view->sport = $sport;

		return $view;
	}

	public function get_add()
	{
		$view = view('sports.add');
		$view->sport = new Sport;

		return $view;
	}

	public function get_edit($id)
	{
		$view = view('sports.edit');
		$view->sport = Sport::find($id);

		return $view;
	}

	public function store(Request $request){

		$input = $request->input();

		$sport = new Sport();
		$sport->name = $input['name'];
		$sport->save();

		return redirect()->route('sports.index');
	}


	public function update(Request $request, $id){

		$input = $request->input();

		$sport = Sport::find($id);
		$sport->name = $input['name'];
		$sport->save();

		return redirect()->route('sports.index');
	}



	public function destroy(Request $request,$id){

		$sport = Sport::find($id);
		$sport->delete();

		return redirect()->route('sports.index');
	}


}
