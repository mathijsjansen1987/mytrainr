@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Locatie wijzigen</div>

				<div class="panel-body">

					{!! link_to_route('locations.index','Naar overzicht') !!}

					<h1>Locatie wijzigen</h1>

					{!! Form::open(array('route'=> array('locations.edit',$location->id), 'files'=> true), "POST") !!}
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Naam</label>

						<div class="col-md-6">
							<input id="name" type="name" class="form-control" name="name" value="{{ $location->name }}">

							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
						<label for="lat" class="col-md-1 control-label">Lat</label>

						<div class="col-md-3">
							<input id="lat" type="lat" class="form-control" name="lat" value="{{ $location->lat }}">

							@if ($errors->has('lat'))
							<span class="help-block">
								<strong>{{ $errors->first('lat') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('long') ? ' has-error' : '' }}">
						<label for="long" class="col-md-1 control-label">Long</label>

						<div class="col-md-3">
							<input id="long" type="long" class="form-control" name="long" value="{{ $location->long }}">

							@if ($errors->has('long'))
							<span class="help-block">
								<strong>{{ $errors->first('long') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">
								Wijzingen
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
