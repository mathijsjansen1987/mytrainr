@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Coaches</div>

				<div class="panel-body">

					<h1>Coaches</h1>
					<p>
						Hieronder staan de coaches die tot je club behoren. Je kunt hier gebruikersaccounts voor coaches beheren.
					</p>

					{!! link_to_route('coaches.add', 'Coach toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					@if(count($coaches) > 0)
					<table class="table">
						<tr>
							<th></th>
							<th>Naam</th>
							<th>Aangemaakt</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($coaches as $coach)
						<tr>
							<td width="35"><i class="fa fa-futbol-o" aria-hidden="true"></i></td>
							<td>{{$coach->name}}</td>
							<td>{{$coach->created_at->format('d-m-Y H:i')}}</td>
							<td width="120">{!! Html::decode(link_to_route('coaches.edit', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($coach->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('coaches.remove', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($coach->id))) !!}</td>
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
