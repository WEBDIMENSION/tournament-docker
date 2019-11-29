@extends('layouts.app')

@section('content')
    <Counter
      count="1"
    ></Counter>
    <main class="p-3">
        <!-- 4個分のタブ -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#photo1" class="nav-link active" data-toggle="tab">タブ１</a>
            </li>
            <li class="nav-item">
                <a href="#photo2" class="nav-link" data-toggle="tab">タブ2</a>
            </li>
            <li class="nav-item">
                <a href="#photo3" class="nav-link" data-toggle="tab">タブ3</a>
            </li>
            <li class="nav-item">
                <a href="#photo4" class="nav-link" data-toggle="tab">タブ4</a>
            </li>
        </ul>

        <!-- 写真部分 -->
        <div class="tab-content">
            <div id="photo1" class="tab-pane active">
                aaa
            </div>
            <div id="photo2" class="tab-pane">
                iii
            </div>
            <div id="photo3" class="tab-pane">
                uuu
            </div>
            <div id="photo4" class="tab-pane">
                eee
            </div>
        </div>
    </main>
    <div class="container">
        <js-ex-component test="test"></js-ex-component>
    </div>
    <div id="app" class="p-3">
        <p>Vanilla.js, jQuery のテスト</p>
        <button onclick="testVanilla()">test_vanilla</button>
        <button id="btn">test_jquery</button>
    </div>

    <!-- vanilla.js はここで読み込む-->
    <script src="{{ mix('js/jquery/test_vanilla.js') }}"></script>
@endsection
