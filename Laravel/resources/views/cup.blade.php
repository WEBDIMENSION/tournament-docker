@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <h1>{{$cup->cup_name}}</h1>
                <div class="col">
                    <img class="card-img-top"
                         src="https://placehold.jp/888888/ffffff/800x600.png?text={{$cup->cup_name}}"
                         alt="{{$cup->cup_name}}">
                    <div class="card-body">
                        <h3 class="card-title">{{$cup->cup_name}}</h3>
                        <h4>subtitle</h4>
                        <p class="card-text">Description</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @if($events)
                    <div class="list-group">
                        @foreach($events as $event)
                            <a href="/event/{{$event->event_number}}" class="list-group-item list-group-item-action mb-2 bg-primary display-5">{{$event->event_name}}</a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
