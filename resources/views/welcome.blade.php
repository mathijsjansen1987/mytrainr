@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Welkom bij mytrainr</div>

				<div class="panel-body">
					<img src="assets/images/logo.png"/>
					<p>Het open video annotatie platform om samen als clubs, trainers en sporters te leren over jouw sport.
						Op dit moment is mytrainr alleen gericht op de schaatssport, wil jij dat ook jouw sport wordt ondersteund neem dan contact op via: <a href="mailto:info@mytrainr.nl?subject=aanvraag andere sport">info@mytrainr.nl</a></p>
						<img src="assets/images/intro.jpg"/><br><br>
						 <a href="{{ URL::to('/') }}/register" class="btn btn-default">Meteen registreren</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
