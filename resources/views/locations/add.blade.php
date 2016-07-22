@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Locatie toevoegen</div>

				<div class="panel-body">

					{!! link_to_route('locations.index','Naar overzicht') !!}

					<h1>Locatie toevoegen</h1>

					{!! Form::open(array('route'=> 'locations.add', 'files'=> true), "POST") !!}
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Naam</label>

						<div class="col-md-6">
							<input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}">

							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Lat</label>

						<div class="col-md-3">
							<input id="lat" type="lat" class="form-control" lat="lat" value="{{ old('lat') }}">

							@if ($errors->has('lat'))
							<span class="help-block">
								<strong>{{ $errors->first('lat') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Long</label>

						<div class="col-md-3">
							<input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}">

							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
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
