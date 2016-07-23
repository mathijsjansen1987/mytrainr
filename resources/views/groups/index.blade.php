@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Groepen</div>

				<div class="panel-body">

					<h1>Groepen</h1>
					<p>
						Hieronder staan de groepen die je training geeft. Je kunt nieuwe groepen aanmaken en beheren welke sporters er in de groep zitten.<br>
						Ook kun je nieuwe sporters toevoegen aan de groepen.
					</p>

					{!! link_to_route('groups.add', 'Groep toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					@if(count($groups) > 0)
					<table class="table">
						<tr>
							<th></th>
							<th>Naam</th>
						<!--	<th>Sporten</th>
							<th>Sporters</th>-->
							<th>Bekijken</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($groups as $group)
						<tr>
							<td width="35"><i class="fa fa-users" aria-hidden="true"></i></td>
							<td>{{$group->name}}</td>
		<!--					<td>{{ implode(', ', array_filter($group->sports->lists('name')->toArray())) }}</td>
							<td>{{ implode(', ', array_filter($group->users->lists('name')->toArray())) }}</td>-->
							<td>{!! Html::decode(link_to_route('groups.view', '<i class="fa fa-eye fa-1x" aria-hidden="true"></i>',array($group->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('groups.edit', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($group->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('groups.remove', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($group->id))) !!}</td>
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
