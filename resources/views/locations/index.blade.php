@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Locaties</div>

				<div class="panel-body">

					<h1>Locaties</h1>
					<p>
						Hieronder staan de locaties waar je traint met de groepen die je les geeft, je kunt de locaties meegeven aan de videos.
					</p>

					{!! link_to_route('locations.add', 'Locatie toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					@if(count($locations) > 0)
					<table class="table">
						<tr>
							<th></th>
							<th>Naam</th>
							<th>Bekijken</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($locations as $location)
						<tr>
							<td width="35"><i class="fa fa-map-marker" aria-hidden="true"></i> </td>
							<td>{{$location->name}}</td>
							<td>{!! Html::decode(link_to_route('locations.view', '<i class="fa fa-eye fa-1x" aria-hidden="true"></i>',array($location->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('locations.edit', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($location->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('locations.remove', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($location->id))) !!}</td>
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
