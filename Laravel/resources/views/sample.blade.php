@extends('layouts.app')

@section('content')
    <div class="container">
{{--    <div id="app">--}}
{{--       <example-component test="Hello World"></example-component>--}}
{{--    </div>--}}
{{--    <div class="" id="sample">--}}
{{--        <sample-component message="hello vue"></sample-component>--}}
{{--    </div>--}}
{{--    <ul id="sake">--}}

{{--        <li v-for="(value,index) in sake">--}}
{{--            @{{ index +1 }}月は@{{ value }}酒が飲めるぞ--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--<axios-component></axios-component>--}}
<socket-component></socket-component>
{{--        <div id="weather2">--}}
{{--            <p>winner : @{{ winner }}</p>--}}
{{--            <p>score : @{{ score }}</p>--}}
{{--        </div>--}}
{{--            <script src="js/main.js"></script>--}}
    </div>
@endsection
