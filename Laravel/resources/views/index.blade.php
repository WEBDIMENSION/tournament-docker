@extends('layouts.app')

@section('content')
  <div class="container">
    <div id="carouselIndicators" class="carousel slide carousel-fade" data-ride="carousel">
      @foreach($carousels as $carousel)
        @if ($loop->first)
          <ol class="carousel-indicators">
            @endif
            <li data-target="#carouselIndicators" data-slide-to="{{$loop->index}}"
                @if ($loop->first)class="active" @endif></li>
            @if ($loop->last)
          </ol>
        @endif
      @endforeach
      <div class="carousel-inner">
        @foreach($carousels as $carousel)
          <div class="carousel-item @if ($loop->first) active @endif ">
            <img class="d-block w-100" src="{{$carousel['src']}}" alt="{{$carousel['title']}}">
            <div class="carousel-caption text-left d-none d-md-block">
              <h3>{{$carousel['title']}}</h3>
              <p>{{$carousel['description']}}</p>
            </div>
          </div>
        @endforeach

        <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Prev</span>
        </a>
        <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <h1 class="display-4">Site Title</h1>
    <p>Site description. This is Laravel test.</p>
    <div class="row">
      <div class="col-md-9">
        <h2>Held today</h2>
        @if($cups)
          <div class="row">
            @foreach($cups as $cup)
              <div class="col-md-6">
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
              </div>
            @endforeach
          </div>
        @else
          <p>No plan</p>
        @endif

      </div>
      <div class="col-md-3">
        @include('layouts.top_right_column',['sponsors'=>$sponsors])
      </div>
    </div>
  </div>
@endsection
