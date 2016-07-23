@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$analyse->created_at->format('d-m-Y H:i')}} ({{$analyse->video->name}})</div>

				<div class="panel-body">

					{!! link_to_route('analysis.index','Naar overzicht') !!}

					<h4>Analyse: {{$analyse->created_at->format('d-m-Y H:i')}} ({{$analyse->video->name}})</h4>

					<video id="video" width="720" height="400" preload>
						<source src="http://db2ih2bbf7xxb.cloudfront.net/{{$analyse->video->local_fullPath}}" type="video/mp4">
						Your browser does not support the video tag.
					</video>
					<br>Snelheid: <button onclick="setPlaybackrate(1)">1.0x</button><button onclick="setPlaybackrate(0.5)">0.5x</button><button onclick="setPlaybackrate(0.1)">0.1x</button><button onclick="setPlaybackrate(0.01)">0.01x</button>

					<h4>Frames/selecties</h4>

					<ul style="margin:0; padding:0; list-style:none;">
						@foreach($video->frames as $frame)
						<li style="display:inline-block">

							<button onclick="goToFrame('{{$frame->time_start}}','{{$frame->time_end}}')">
								@if($frame->time_start == $frame->time_end)
									<i class="fa fa-picture-o" aria-hidden="true"></i> {{$frame->phase->name}} : {{$frame->time_start}} sec
								@else
									<i class="fa fa-file-video-o" aria-hidden="true"></i> {{$frame->phase->name}} : {{$frame->time_start}}-{{$frame->time_end}} sec
								@endif
							</button>

							<span class="notes" style="display:none;">
								@foreach($frame->note as $note)
								<h4><strong>{{$note->type}}</strong></h4>
								<p>{{$note->content}}</p>
								<hr>
								@endforeach
							</span>

						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var vid = $('#video');
	var src = $('#video source');
	var original_src = src.attr('src');
	var speed = 1;

	function goToFrame(time_start,time_end){

		if(time_start == time_end){
			$('#video').get(0).currentTime = time_start;
			$('#video').get(0).pause();
		}

		else{
			src.attr('src',original_src+'#t='+time_start+","+time_end);
			$('#video').get(0).load();
			$('#video').get(0).playbackRate = speed;
			$('#video').get(0).play();
		}


	}

	function setPlaybackrate(value){
		speed = value;
	}
</script>
@endsection
