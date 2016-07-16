@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                  <h1>Videos</h1>
					<p>
						Hieronder staan je videos
					</p>

					{!! link_to_route('groupadd', 'Video toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					<table class="table">

						<tr>
							<th>ID</th>
							<th>Datum</th>
							<th>Locatie</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($videos as $video)
							<tr>
								<td>{{$video->id}}</td>
								<td>{{ $video->created_at->format('d-m-Y H:m:s') }}</td>
								<td>{{ $video->location->name }}</td>
								<td width="120">{!! Html::decode(link_to_route('groupdetail', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($video->id))) !!}</td>
								<td width="120">{!! Html::decode(link_to_route('groupdetail', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($video->id))) !!}</td>
							</tr>
						@endforeach
					</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
