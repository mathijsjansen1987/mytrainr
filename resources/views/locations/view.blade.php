@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$location->name}}</div>

				<div class="panel-body">

					{!! link_to_route('locations.index','Naar overzicht') !!} | {!! link_to_route('locations.edit','Locatie bewerken',$location->id) !!}

					<h1>Locatie: {{$location->name}}</h1>

					Google maps hier + statistieken van aantal oefeningen op deze baan.


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
