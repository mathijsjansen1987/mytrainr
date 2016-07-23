@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Video's</div>

				<div class="panel-body">

					<h1>Video's</h1>
					<p>
						Hieronder staan de videos die je hebt opgeslagen. Je kunt nieuwe video's uploaden en beheren.</p>

					{!! link_to_route('videos.add', 'Video toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					@if(count($videos) > 0)
					<table class="table">
						<tr>
							<th></th>
							<th>Naam</th>
							<th>Bekijken</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($videos as $video)
						<tr>
							<td width="35"><i class="fa fa-video-camera" aria-hidden="true"></i> </td>
							<td>{{$video->name}}</td>
							<td>{!! Html::decode(link_to_route('videos.view', '<i class="fa fa-eye fa-1x" aria-hidden="true"></i>',array($video->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('videos.edit', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($video->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('videos.remove', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($video->id))) !!}</td>
						</tr>
						@endforeach
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
