@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Video toevoegen</div>

				<div class="panel-body">

					{!! link_to_route('videos.index','Naar overzicht') !!}

					<h1>Video toevoegen</h1>

					{!! Form::open(array('route'=> 'videos.add', 'files'=> true), "POST") !!}
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Bestand</label>

						<div class="col-md-12">
							{{ Form::file('file')}}

							@if ($errors->has('file'))
							<span class="help-block">
								<strong>{{ $errors->first('file') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">

						<label for="sport" class="col-md-1 control-label">Locatie</label>

						<div class="col-md-12">
							{!! Form::select('location', $locations, $video->location) !!}

							@if ($errors->has('location'))
							<span class="help-block">
								<strong>{{ $errors->first('location') }}</strong>
							</span>
							@endif
						</div>

					</div>
					<br><br>
					<div class="form-group{{ $errors->has('users') ? ' has-error' : '' }}">

						<label for="sport" class="col-md-1 control-label">Sporters</label>

						<div class="col-md-12">
							{!! Form::select('users', $users, $video->users,array('multiple'=>'multiple','name'=>'users[]')) !!}

							@if ($errors->has('users'))
							<span class="help-block">
								<strong>{{ $errors->first('users') }}</strong>
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
