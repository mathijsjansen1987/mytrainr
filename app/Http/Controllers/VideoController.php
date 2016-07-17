<?php

namespace App\Http\Controllers;

use Auth;
use App\Video;
use App\Http\Requests;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$view = view('videos');
		$view->videos = Auth::user()->videos;

		return $view;
    }

		public function detail($id)
	{
		$view = view('videodetail');
		$view->video = Video::find($id);
		return $view;
	}
}
