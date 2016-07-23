@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Training toevoegen</div>

				<div class="panel-body">

					{!! link_to_route('trainings.index','Naar overzicht') !!}

					<h1>Training toevoegen</h1>

					{!! Form::open(array('route'=> 'trainings.add', 'files'=> true), "POST") !!}
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Naam</label>

						<div class="col-md-12">
							<input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}">

							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('time_from') ? ' has-error' : '' }}">
						<label for="time_from" class="col-md-1 control-label">Tijdstip(vanaf)</label>

						<div class="col-md-12">
							<input id="time_from" type="name" class="form-control" name="time_from" value="{{ old('time_from') }}">

							@if ($errors->has('time_from'))
							<span class="help-block">
								<strong>{{ $errors->first('time_from') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('time_till') ? ' has-error' : '' }}">
						<label for="time_till" class="col-md-1 control-label">Tijdstip(tot)</label>

						<div class="col-md-12">
							<input id="time_till" type="name" class="form-control" name="time_till" value="{{ old('time_till') }}">

							@if ($errors->has('time_till'))
							<span class="help-block">
								<strong>{{ $errors->first('time_till') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">

						<label for="sport" class="col-md-1 control-label">Locatie</label>

						<div class="col-md-12">
							{!! Form::select('location', $locations, $training->location) !!}

							@if ($errors->has('location'))
							<span class="help-block">
								<strong>{{ $errors->first('location') }}</strong>
							</span>
							@endif
						</div>

					</div>
					<br><br>

					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">
								Toevoegen
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
