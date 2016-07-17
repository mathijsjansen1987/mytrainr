@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$group->name}}</div>

				<div class="panel-body">

					{!! link_to_route('groups','Naar overzicht') !!}

					<h1>Groep: {{$group->name}}</h1>

					<h2>Sporters in deze groep</h2>
					<table class="table">

						<tr>
							<th>Naam</th>
							<th>E-mailadres</th>
						</tr>

						@foreach($users as $user)

						<tr>
							<td>{{$user->name}}</td>
							<td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
						</tr>



						@endforeach
					</table>



				</div>
			</div>
		</div>
	</div>
</div>
@endsection
