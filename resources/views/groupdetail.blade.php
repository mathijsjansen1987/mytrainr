@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$group->name}}</div>

                <div class="panel-body">

                    {!! link_to_route('groups','Naar overzicht') !!}

                    <h1>Groep: {{$group->name}}</h1>

                   Sporters in deze groep:
                   {{$group->sporters}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
