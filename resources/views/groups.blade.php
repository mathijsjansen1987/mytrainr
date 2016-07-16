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

					<button type="button" class="btn btn-primary">Groep toevoegen</button><br>


					<table class="table">
						@foreach($groups as $group)

						<tr>
							<th>ID</th>
							<th>Naam</th>
							<th>beheren</th>
						</tr>


						<tr>
							<td>{{$group->id}}</td>
							<td>{{$group->name}}</td>
							<td>{!! link_to_route('groupdetail', 'Bewerken',array($group->id)) !!}</td>
						</tr>


						@endforeach
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
