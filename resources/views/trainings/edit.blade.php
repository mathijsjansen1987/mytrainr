@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Sport wijzigen</div>

				<div class="panel-body">

					{!! link_to_route('sports.index','Naar overzicht') !!}

					<h1>Sport wijzigen</h1>

					{!! Form::open(array('route'=> array('sports.edit',$sport->id), 'files'=> true), "POST") !!}
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-1 control-label">Naam</label>

						<div class="col-md-6">
							<input id="name" type="name" class="form-control" name="name" value="{{ $sport->name }}">

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
