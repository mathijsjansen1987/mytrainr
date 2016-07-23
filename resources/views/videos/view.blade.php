@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$video->name}}</div>

				<div class="panel-body">

					{!! link_to_route('videos.index','Naar overzicht') !!} | {!! link_to_route('videos.edit','video bewerken',$video->id) !!}

					<h1>Video: {{$video->name}}</h1>

					<h4>Sporter(s):	{{implode(', ',$users->toArray())}}</h4>
					<h4>Locatie: {{$video->location->name}}</h4>
					<h4>Sport: {{$video->sport->name}}</h4>


					<video id="video" width="720" height="480" controls>
						<source src="{{Storage::disk('s3')->url($video->local_fullPath)}}" type="video/mp4">
						Your browser does not support the video tag.
					</video>
					<br>
					<button onclick="setPlaybackrate(1)">1.0x</button><button onclick="setPlaybackrate(0.5)">0.5x</button><button onclick="setPlaybackrate(0.1)">0.1x</button><button onclick="setPlaybackrate(0.01)">0.01x</button>

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var vid = document.getElementById("video");
	function setPlaybackrate(value){
		vid.playbackRate = value;
	}
</script>

@endsection
