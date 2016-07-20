@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$group->name}}</div>

				<div class="panel-body">

					<h1>Groep wijzigen</h1>

					{!! Form::open(array('route'=> array('groups.edit',$group->id), 'files'=> true), "POST") !!}
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Naam</label>

						<div class="col-md-12">
							<input id="name" type="name" class="form-control" name="name" value="{{ $group->name }}">

							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Beschrijving</label>

						<div class="col-md-12">
							<textarea id="description" class="form-control" name="description" rows="4">{{$group->description}}</textarea>
							@if ($errors->has('description'))
							<span class="help-block">
								<strong>{{ $errors->first('description') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<br><br>
					<div class="form-group{{ $errors->has('sport') ? ' has-error' : '' }}">

						<label for="sport" class="col-md-1 control-label">Sport</label>

						<div class="col-md-12">
							{!! Form::select('sports', $sports, $group->sports->lists('id')->all(),array('multiple'=>'multiple','name'=>'sports[]')) !!}

							@if ($errors->has('sports'))
							<span class="help-block">
								<strong>{{ $errors->first('sports') }}</strong>
							</span>
							@endif
						</div>

					</div>
					<br><br>
					<div class="form-group{{ $errors->has('users') ? ' has-error' : '' }}">

						<label for="sport" class="col-md-1 control-label">Sporters</label>

						<div class="col-md-12">
							{!! Form::select('users', $users, $group->users->lists('id')->all(),array('multiple'=>'multiple','name'=>'users[]')) !!}

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
