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

					{!! link_to_route('groupadd', 'Groep toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>


					<table class="table">

						<tr>
							<th>ID</th>
							<th>Naam</th>
							<th>Bewerken</th>
							<th>Verwijderen</th>
						</tr>

						@foreach($groups as $group)
							<tr>
								<td>{{$group->id}}</td>
								<td>{{$group->name}}</td>
								<td width="120">{!! Html::decode(link_to_route('groupdetail', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($group->id))) !!}</td>
								<td width="120">{!! Html::decode(link_to_route('groupdetail', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($group->id))) !!}</td>
							</tr>
						@endforeach
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
