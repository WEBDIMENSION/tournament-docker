@extends('layouts.app')

@section('content')
  <div class="container">
    @if($cups)
      <h1>Regsted Cups</h1>
      <div class="row">
        @foreach($cups as $cup)
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
              <div class="row">
                <div class="col-md-4">
                  <ul class="nav nav-tabs border-bottom-0 list-group" id="eventTab" role="eventTablist">
                    @foreach($cup->events as $event)
                      <li class="nav-item bg-primary mb-2 list-group-item-action"><a class="nav-link"
                                                                                     id="e{{$cup->id.$event->id}}-tab"
                                                                                     data-toggle="tab"
                                                                                     href="#e{{$cup->id.$event->id}}"
                                                                                     role="tab"
                                                                                     aria-controls="e{{$cup->id.$event->id}}"
                                                                                     aria-selected="false">{{$event->event_name}}</a>
                      </li>
                      {{--                      <button type="button" class="btn btn-link mb-2 bg-primary list-group-item-action" >{{$event->event_name}}</button>--}}
                    @endforeach
                  </ul>
                </div>
                <div class="col-md-8 tab-content " id="eventTabContent">
                  @foreach($cup->events as $event)
                    <div class="tab-pane fade" id="e{{$cup->id.$event->id}}" role="tabpanel"
                         aria-labelledby="e{{$cup->id.$event->id}}-tab">
                      @if(count($event->getRounds($event->id))>0)

                        <ul class="nav nav-tabs bg-warning" id="cardTab" role="cardTablist">
                          @foreach($event->getRounds($event->id) as $rounds)
                            <li class="nav-item">
                              <a class="nav-link  bg-warning" id="c{{$event->id.$rounds['round']}}-tab"
                                 data-toggle="tab"
                                 href="#c{{$event->id.$rounds['round']}}" role="tab"
                                 aria-controls="c{{$event->id.$rounds['round']}}" aria-selected="false">
                                @if($loop->last) <span>F</span> @elseif($loop->remaining==1) <span>SF</span> @else<span>{{$rounds['round']}}R</span> @endif
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      @else
                        No regist
                      @endif

                      @if(count($event->getRounds($event->id))>0)
                        <div class="tab-content mt-3" id="cardTabContent">
                          @foreach($event->getRounds($event->id) as $rounds)
                            <div class="tab-pane fade" id="c{{$event->id.$rounds['round']}}" role="tabpanel"
                                 aria-labelledby="c{{$event->id.$rounds['round']}}-tab">
                              <ul class="list-group">
                                @foreach($event->getCardsInRound($event->id,$rounds['round']) as $card)
                                  <li class="list-group-item list-group-item-action mb-2 bg-success" data-toggle="modal"
                                      data-target="#modal{{$card->id}}">
                                    <div class="row">

                                      <div class="col-md-4
                                        @if($card->winner != '' and $card->winner != $card->player_a_id)
                                          text-secondary
                                          @endif
                                          ">
                                        @foreach($event->getPlayerName($card->player_a_id) as $person)
                                          <span class="mr-2 d-block">{{$person['name']}}</span>
                                        @endforeach
                                      </div>

                                      <div class="col-md-1 align-self-center">Vs</div>

                                      <div class="col-md-4 text-center
                                        @if($card->winner != '' and $card->winner != $card->player_b_id)
                                          text-secondary
                                          @endif
                                          ">
                                        @foreach($event->getPlayerName($card->player_b_id) as $person)
                                          <span class="mr-2 d-block"> {{$person['name']}}</span>
                                        @endforeach
                                      </div>
                                      <div class="col-md-2 align-self-center">Score<br>
                                        <span class="mr-2 d-block text-center"> {{$card->score}}</span>
                                      </div>
                                      {{--                                      <div class="col-md-1 align-self-center"><a href="#modal{{$card->id}}">Edit</a></div>--}}
                                      <div class="col-md-1 d-block badge badge-danger align-self-center"><a
                                            href="#modal{{$card->id}}">Edit</a></div>
                                    </div>
                                  </li>
                                  {{--                                  <button type="button" class="btn btn-danger" data-toggle="modal"--}}
                                  {{--                                          data-target="#modal{{$card->id}}"></button>--}}
                                <!-- モーダルウィンドウ外枠 -->
                                  <div class="modal" id="modal{{$card->id}}" tabindex="-1" role="dialog"
                                       aria-labelledby="exampleModalLabel{{$card->id}}" aria-hidden="true">
                                    <form action="/home" method="post">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="id" value="{{$card->id}}">
                                      <!-- モーダルのダイアログ本体 -->
                                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <!-- モーダルのコンテンツ部分 -->
                                        <div class="modal-content">
                                          <!-- モーダルのヘッダー -->
                                          <div class="modal-header">
                                            <!-- モーダルのタイトル -->
                                            <h5 class="modal-title" id="exampleModalLabel{{$card->id}}">
                                              {{$event->event_name}}
                                              @if($loop->last) <span>F</span> @elseif($loop->remaining==1)
                                                <span>SF</span> @else<span>{{$rounds['round']}}R</span> @endif
                                              {{$card->card_number}}Game.
                                            </h5>
                                            <!-- 閉じるアイコン -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;[ESC]</span>
                                            </button>
                                          </div>
                                          <!-- モーダルの本文 -->
                                          <div class="modal-body row">
                                            <div class="col-md-4" id="box-winner">
                                              <h5>Winner</h5>
                                              <div class="form-check">
                                                <input type="radio" id="radio1" class="form-check-input"
                                                       name="winner"
                                                       value="{{$card->player_a_id}}"
                                                       @if($card->player_a_id == $card->winner)
                                                       checked="checked"
                                                    @endif
                                                >
                                                <label class="form-check-label" for="radio1">
                                                  @foreach($event->getPlayerName($card->player_a_id) as $person)
                                                    <span class="mr-2 d-block"> {{$person['name']}}</span>
                                                  @endforeach
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input type="radio" id="radio2" class="form-check-input"
                                                       name="winner"
                                                       value="{{$card->player_b_id}}"
                                                       @if($card->player_b_id == $card->winner)
                                                       checked="checked"
                                                    @endif
                                                >
                                                <label class="form-check-label" for="radio1">
                                                  @foreach($event->getPlayerName($card->player_b_id) as $person)
                                                    <span class="mr-2 d-block"> {{$person['name']}}</span>
                                                  @endforeach
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              Score
                                              <input type="text" name="score" value="{{$card->score}}">
                                            </div>
                                            <div class="col-md-4">
                                              <button>Retire</button>
                                              <button>NotPlay</button>
                                            </div>
                                          </div>
                                          <!-- モーダルのフッター -->
                                          <div class="modal-footer">
                                            <!-- 閉じるボタン -->
                                            <button type="submit">Send</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる
                                            </button>

                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                @endforeach
                              </ul>
                            </div>
                          @endforeach
                        </div>
                      @else
                      @endif


                    </div>
                  @endforeach
                </div>
              </div>
            @endif
          </div>
        @endforeach
      </div>
    @else
      <p>No plan</p>
    @endif
    {{--    --}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">Dashboard</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    @if (session('status'))--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            {{ session('status') }}--}}
    {{--                        </div>--}}
    {{--                    @endif--}}

    {{--                    You are logged in!--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
  </div>
@endsection
