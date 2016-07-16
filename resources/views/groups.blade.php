@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Groepen</div>

                <div class="panel-body">

                    <h1>Groepen</h1>

                    @foreach($groups as $group)
						{!! link_to_route('groupdetail', $group->name,array($group->id)) !!}

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
