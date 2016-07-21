<?php

namespace App\Http\Controllers\Coach;

use Auth;
use Storage;
use App\Video;
use App\User;
use App\Sport;
use App\Location;
use App\Http\Requests;
use Illuminate\Http\Request;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$user = Auth::user();

		$view = view('videos.index');
		$view->videos = Video::all();

		return $view;
	}

	public function get_view($id)
	{
		$video = Video::find($id);

		$view = view('videos.view');
		$view->video = $video;
		$view->users = $video->users->lists('name');

		return $view;
	}

	public function get_add()
	{
		$view = view('videos.add');
		$view->video = new Video;
		$view->users = User::all()->lists('name','id');
		$view->sports = Sport::all()->lists('name','id');
		$view->locations = Location::lists('name','id');

		return $view;
	}

	public function get_edit($id)
	{
		$view = view('videos.edit');
		$view->group = Group::find($id);
		$view->users = User::all()->lists('name','id');
		$view->sports = Sport::lists('name','id');
		$view->locations = Location::lists('name','id');

		return $view;
	}

	public function store(Request $request){


		$user_id = Auth::user()->id;

		// check if there is allready an upload folder for the user
		if(!Storage::directories('uploads/'.$user_id))
			Storage::disk('s3')->makeDirectory('uploads/'.$user_id);

		$file = $request->file('file');

		$filename = $file->getClientOriginalName();
		$path = $file->getPathName();
		$mime = $file->getMimeType();
		$extension = $file->getClientOriginalExtension();


		$input = $request->input();
		$video = new Video();
		$video->local_fullPath = 'public/videos/'.$user_id.'/'.$filename;
		$video->location_id = $request->input('location');
		$video->sport_id = $request->input('sports');

		$video->name = $filename;

		Storage::put(
			'public/videos/'.$user_id.'/'.$filename,
			file_get_contents($request->file('file')->getRealPath())
		);

		Storage::disk('s3')->put(
			'public/videos/'.$user_id.'/'.$filename,
			file_get_contents($request->file('file')->getRealPath())
		);


		$video->save();


		$video->users()->sync($request->input('users'));

		/*	$videos->users()->sync($input['users']);
		$videos->sports()->sync($input['sports']);*/

		return redirect()->route('videos.index');
	}


	public function update(Request $request, $id){

		$input = $request->input();

		$videos = Group::find($id);
		$videos->name = $input['name'];
		$videos->description = $input['description'];
		$videos->save();

		$videos->users()->sync($input['users']);
		$videos->sports()->sync($input['sports']);

		return redirect()->route('videos.index');
	}



	public function destroy(Request $request,$id){


		$video = Video::find($id);
		// $videos->users()->detach($videos->users);

		// remove file local
		Storage::delete($video->local_fullPath);
		Storage::disk('s3')->delete($video->local_fullPath);

		// remove video
		$video->delete();

		return redirect()->route('videos.index');
	}


}
