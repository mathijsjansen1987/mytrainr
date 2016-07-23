<?php

namespace App\Http\Controllers\Coach;
use Auth;
use App\Group;
use App\User;
use App\Sport;
use App\Location;
use App\Analyse;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalysisController extends Controller
{

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$user = Auth::user();

		$view = view('analysis.index');
		$view->analysis = Analyse::all();
		return $view;
	}

	public function get_view($id)
	{
		$analyse = Analyse::find($id);

		$view = view('analysis.view');
		$view->analyse = $analyse;
		$view->video = $analyse->video;

		return $view;
	}

	public function get_add()
	{
		$view = view('locations.add');
		$view->location = new Location;

		return $view;
	}

	public function get_edit($id)
	{
		$view = view('locations.edit');
		$view->location = Location::find($id);

		return $view;
	}

	public function store(Request $request){

		$input = $request->input();

		$location = new Location();
		$location->name = $input['name'];
		$location->lat = $input['lat'];
		$location->long = $input['long'];
		$location->save();

		return redirect()->route('locations.index');
	}


	public function update(Request $request, $id){

		$input = $request->input();

		$location = Location::find($id);
		$location->name = $input['name'];
		$location->lat = $input['lat'];
		$location->long = $input['long'];
		$location->save();

		return redirect()->route('locations.index');
	}



	public function destroy(Request $request,$id){

		$location = Location::find($id);
		$location->delete();

		return redirect()->route('locations.index');
	}


}
