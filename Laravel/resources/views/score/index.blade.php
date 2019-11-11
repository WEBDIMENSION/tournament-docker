@extends('layouts.app')

@section('content')
    <div class="container">
        @if($cups)
            <h1>Regsted Cups Ver.Vue</h1>
                <score-cups-component data-cups="{{$cupsJson}}"></score-cups-component>

{{--                @foreach($cups as $cup)--}}
{{--                    <div class="col-md-3">--}}
{{--                        <a href="/score/{{$cup->cup_number}}">--}}
{{--                            <img class="card-img-top"--}}
{{--                                 src="https://placehold.jp/888888/ffffff/800x600.png?text={{$cup->cup_name}}"--}}
{{--                                 alt="{{$cup->cup_name}}">--}}
{{--                        </a>--}}
{{--                        <div class="card-body">--}}
{{--                            <h3 class="card-title">{{$cup->cup_name}}</h3>--}}
{{--                            <h4>subtitle</h4>--}}
{{--                            <p class="card-text">Description</p>--}}
{{--                        </div>--}}
{{--                        --}}{{--            <score-notice-component></score-notice-component>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

            </div>
        @endif
@endsection
