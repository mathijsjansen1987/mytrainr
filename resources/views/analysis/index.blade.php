@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Analyses</div>

				<div class="panel-body">

					<h1>Analyses</h1>
					<p>
						Hieronder staan de analyses die je hebt gemaakt.
					</p>

					{!! link_to_route('analysis.add', 'Analyse toevoegen',array(),array('class'=>'btn btn-primary')) !!}

					<br><br>

					@if(count($analysis) > 0)<table class="table">
						<tr>
							<th></th>
							<th>Video</th>
							<th>Aangemaakt</th>
							<th>Bekijken</th>
							<th>Bewerken</th>s
							<th>Verwijderen</th>
						</tr>

						@foreach($analysis as $analyse)
						<tr>
							<td width="35"><i class="fa fa-line-chart" aria-hidden="true"></i></td>
							<td>{{$analyse->video->name}}</td>
							<td>{{$analyse->created_at->format('d-m-Y H:i')}}</td>
							<td>{!! Html::decode(link_to_route('analysis.view', '<i class="fa fa-eye fa-1x" aria-hidden="true"></i>',array($analyse->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('analysis.edit', '<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>',array($analyse->id))) !!}</td>
							<td width="120">{!! Html::decode(link_to_route('analysis.remove', '<i class="fa fa-trash fa-1x" aria-hidden="true"></i>',array($analyse->id))) !!}</td>
						</tr>
						@endforeach
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
