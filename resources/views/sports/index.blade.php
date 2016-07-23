@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Sporten</div>

				<div class="panel-body">

					<h1>Sporten</h1>
					<p>
						Hieronder staan de sporten die je met je sporters beoefend. Je kunt hier de sporten beheren.
					</p>

					{!! link_to_route('sports.add', 'Sport toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					@if(count($sports) > 0)
					<table class="table">
						<tr>
							<th>Naam</th>
							<th>Aangemaakt</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($sports as $sport)
						<tr>
							<td>{{$sport->name}}</td>
							<td>{{$sport->created_at->format('d-m-Y H:i')}}</td>
							<td width="120">{!! Html::decode(link_to_route('sports.edit', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($sport->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('sports.remove', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($sport->id))) !!}</td>
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
