@extends('layouts.app')

@section('content')
    <div class="container">
        @if($cup)
            <h1>Regsted Cups</h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="/cup/{{$cup->cup_number}}">
                        <img class="card-img-top"
                             src="https://placehold.jp/888888/ffffff/800x600.png?text={{$cup->cup_name}}"
                             alt="{{$cup->cup_name}}">
                    </a>
                    <div class="card-body">
                        <h3 class="card-title">{{$cup->cup_name}}</h3>
                        <h4>subtitle</h4>
                        <p class="card-text">Description</p>
                    </div>
                    <score-notice-component></score-notice-component>
                </div>

                <div class="col-md-9">
                    @if($cup->events)
                        <div class="w100" id="eventTab" role="">
                            @foreach($cup->events as $event)
                                {{--                                        {{$event->event_name}}--}}
                                <display-event-component
                                    cup-id="{{$cup->id}}"
                                    cup-name="{{$cup->cup_name}}"
                                    event-id="{{$event->id}}"
                                    event-name="{{$event->event_name}}"
                                    event-number="{{$event->event_number}}"
                                    players-count="{{$event->players_count}}"
                                    set-count="{{$event->set_count}}"
                                    rule="{{$event->rule}}"
                                    tiebreak="{{$event->tiebreak}}"
                                    token="{{ Auth::user()->api_token }}"
                                ></display-event-component>
                                {{--                                        <li class="nav-item bg-primary mb-2 list-group-item-action"><a class="nav-link"--}}
                                {{--                                                                                                       id="e{{$cup->id.$event->id}}-tab"--}}
                                {{--                                                                                                       data-toggle="tab"--}}
                                {{--                                                                                                       href="#e{{$cup->id.$event->id}}"--}}
                                {{--                                                                                                       role="tab"--}}
                                {{--                                                                                                       aria-controls="e{{$cup->id.$event->id}}"--}}
                                {{--                                                                                                       aria-selected="false">{{$event->event_name}}</a>--}}
                                {{--                                        </li>--}}
                            @endforeach
                        </div>
                    @endif
                </div>
                @else
                    <p>No plan</p>
                @endif
            </div>
@endsection
