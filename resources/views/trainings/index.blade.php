@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Trainingen</div>

				<div class="panel-body">

					<h1>Trainingen</h1>
					<p>
						Hieronder staan de trainingen die je uitvoert met je groepen. Je kunt hier de trainingen beheren.
					</p>

					{!! link_to_route('trainings.add', 'Training toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					@if(count($trainings) > 0)
					<table class="table">
						<tr>
							<th></th>
							<th>Naam</th>
							<th>Locatie</th>
							<th>Groep</th>
							<th>Trainignstijd</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($trainings as $training)
						<tr>
							<td><i class="fa fa-book" aria-hidden="true"></i></td>
							<td>{{$training->name}}</td>
							<td>{{$training->name}}</td>
							<td>{{$training->name}}</td>
							<td width="120">{!! Html::decode(link_to_route('trainings.edit', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($training->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('trainings.remove', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($training->id))) !!}</td>
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
