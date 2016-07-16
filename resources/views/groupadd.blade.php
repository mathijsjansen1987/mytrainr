@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Groep toevoegen</div>

				<div class="panel-body">

					<h1>Groep toevoegen</h1>

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
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

						<div class="form-group">
							<div class="col-md-1 col-md-offset-1">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-plus"></i> Toevoegen
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


