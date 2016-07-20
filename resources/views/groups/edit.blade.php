@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Groep toevoegen</div>

				<div class="panel-body">

					<h1>Groep wijzigen</h1>

					{!! Form::open(array('route'=> 'groups.add', 'files'=> true), "POST") !!}
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Naam</label>

						<div class="col-md-6">
							<input id="name" type="name" class="form-control" name="name" value="{{ $group->name }}">

							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('sport') ? ' has-error' : '' }}">

						<label for="sport" class="col-md-1 control-label">Sport</label>

						<div class="col-md-6">
							{!! Form::select('sport', $sports, $group->sport_id) !!}

							@if ($errors->has('sport'))
							<span class="help-block">
								<strong>{{ $errors->first('sport') }}</strong>
							</span>
							@endif
						</div>

					</div>
					<br><br>
					<div class="form-group">
						<div class="col-md-1 col-md-offset-1">

							<button class="btn ">
								Annuleren
							</button>

							<button type="submit" class="btn btn-primary">
								Wijzigen
							</button>
						</div>
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
