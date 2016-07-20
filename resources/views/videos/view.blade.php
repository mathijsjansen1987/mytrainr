@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$video->created_at->format('d-m-Y')}}</div>

				<div class="panel-body">

					{!! link_to_route('videos','Naar overzicht') !!}

					<h1>Video: {{$video->created_at->format('d-m-Y')}}</h1>

					<video width="720" height="390" controls>
						<source src="{{$video->cloud_fullPath}}" type="video/mp4">
						Your browser does not support the video tag.
					</video>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
