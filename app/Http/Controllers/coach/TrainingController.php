<?php

namespace App\Http\Controllers\Coach;
use Auth;
use App\Group;
use App\User;
use App\Training;
use App\Sport;
use App\Location;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$user = Auth::user();

		$view = view('trainings.index');
		$view->trainings = Training::all();
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
		$view = view('trainings.add');
		$view->training = new Training;

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

		$training = Training::find($id);
		$training->delete();

		return redirect()->route('trainings.index');
	}


}
