@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$group->name}}</div>

				<div class="panel-body">

					{!! link_to_route('groups.index','Naar overzicht') !!} | {!! link_to_route('groups.edit','Groep bewerken',$group->id) !!}

					<h1>Groep: {{$group->name}}</h1>

					<p>{{$group->description}}</p>

					@if(count($group->sports) > 0)
					<h2>Sporten die worden beoefend door de groep</h2>

					<table class="table">
						<tr>
							<th>Naam</th>
						</tr>
						@foreach($group->sports as $sport)
						<tr>
							<td>{{$sport->name}}</td>
						</tr>
						@endforeach
					</table>
					@endif


					@if(count($group->users) > 0)
					<h2>Sporters in deze groep</h2>

					<table class="table">
						<tr>
							<th>Naam</th>
							<th>E-mailadres</th>
						</tr>
						@foreach($group->users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
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
