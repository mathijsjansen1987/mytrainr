@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <h1>Videos</h1>

                    @foreach($videos as $video)

                    <img src="{{$video->cover}}" width="100%" height="auto"/>

                    	Locatie: {{$video->location->name}} <br>
                    	Sporter: {{$video->user->name}} <br>
                    	Geupload: {{ $video->created_at->format('d-m-Y H:m:s') }}
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
