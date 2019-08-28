@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <h1 class="col-md-6 h3">{{$event->event_name}}</h1>
            <h1 class="col-md-6 h5 text-right">{{$cup_name}}</h1>
        </div>
            <div class="row justify-content-around">
            <button type="button" class="d-block btn-info col-5 m-auto mb-3 m-md-0 col-md-2 mr-md-2">Player&nbsp;<span class="badge badge-primary">{{$event->players_count}}</span></button>
            <button type="button" class="d-block btn-info col-5 m-auto mb-3 m-md-0 col-md-2 mr-md-2">SET&nbsp;<span class="badge badge-primary">{{$event->set_count}}</span></button>
            <div class="w-100 mb-3 d-md-none"></div>
            <button type="button" class="d-block btn-info col-5 m-auto mb-3 m-md-0 col-md-2 mr-md-2"><span class="badge badge-primary">{{$event->rule}}</span>&nbsp;Game First</button>
            <button type="button" class="d-block btn-info col-5 m-auto mb-3 m-md-0 col-md-2 ">Final Tiebreak&nbsp;<span class="badge badge-primary">{{$event->tiebreak}}</span></button>
            </div>
    </div>
@endsection
