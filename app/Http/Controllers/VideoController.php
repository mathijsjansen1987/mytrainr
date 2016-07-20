<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Video;
use App\Http\Requests;
use Illuminate\Http\Request;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class VideoController extends Controller
{
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$view = view('videos.index');
		$view->videos = Auth::user()->videos;

		return $view;
	}

	public function detail($id)
	{
		$view = view('videos.view');
		$view->video = Video::find($id);
		return $view;
	}


	public function get_add(){

		$view = view('videos.add');
		$view->video = new Video();
		return $view;

	}

	public function store(Requests $request)
	{
		$user_id = Auth::user()->id;

		// check if there is allready an upload folder for the user
		if(!Storage::directories('uploads/'.$user_id))
			Storage::disk('s3')->makeDirectory('uploads/'.$user_id);

		$tmp_url = $request->file('video');

		dd($tmp_url);



	}
}
