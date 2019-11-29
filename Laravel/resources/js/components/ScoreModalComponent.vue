<template>
  <!-- モーダルウィンドウ外枠 -->
  <div
    :id="[exampleModalLabelId]"
    class="modal"
    :modalid="[modalId]"
    tabindex="-1"
    role="dialog"
    :exampleModalLabel="[exampleModalLabel]"
    aria-hidden="true"
  >
    <!-- モーダルのダイアログ本体 -->
    <div
      class="modal-dialog modal-dialog-centered modal-lg"
      role="document"
    >
      <!-- モーダルのコンテンツ部分 -->
      <div class="modal-content">
        <!-- モーダルのヘッダー -->
        <div class="modal-header">
          <!-- モーダルのタイトル -->
          <h5
            :id="[exampleModalLabelId]"
            class="modal-title"
          >
            <!--                        {{$event->event_name}}-->
            <!--                        @if($loop->last) <span>F</span> @elseif($loop->remaining==1)-->
            <!--                        <span>SF</span> @else<span>{{$rounds['round']}}R</span> @endif-->
            <!--                        {{$card->card_number}}Game.-->
          </h5>
          <!-- 閉じるアイコン -->
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;[ESC]</span>
          </button>
        </div>
        <!-- モーダルの本文 -->
        <div class="modal-body row">
          <!--                    <div class="col-md-4" id="box-winner">-->
          <!--                        <h5>Winner</h5>-->
          <!--                        <div class="form-check">-->
          <!--                            <input type="checkbox" id="radio1" class="form-check-input" name="winner"-->
          <!--                                   value="{{$card->player_a_id}}" v-model="winner">-->
          <!--                            <label class="form-check-label" for="radio1">-->
          <!--                                @foreach($event->getPlayerName($card->player_a_id) as $person)-->
          <!--                                <span class="mr-2 d-block"> {{$person['name']}}</span>-->
          <!--                                @endforeach-->
          <!--                            </label>-->
          <!--                        </div>-->
          <!--                        <div class="form-check">-->
          <!--                            <input type="checkbox" id="radio2" class="form-check-input" name="winner"-->
          <!--                                   value="{{$card->player_b_id}}" v-model="winner">-->
          <!--                            <label class="form-check-label" for="radio1">-->
          <!--                                @foreach($event->getPlayerName($card->player_b_id) as $person)-->
          <!--                                <span class="mr-2 d-block"> {{$person['name']}}</span>-->
          <!--                                @endforeach-->
          <!--                            </label>-->
          <!--                        </div>-->
          <!--                    </div>-->
          <div class="col-md-4">
            Score
            <!--                        <input type="text" name="score" value="{{$card->score}}" v-model="score">-->
          </div>
          <div class="col-md-4">
            <button>Retire</button>
            <button>NotPlay</button>
          </div>
        </div>
        <!-- モーダルのフッター -->
        <div class="modal-footer">
          <!-- 閉じるボタン -->
          <button
            type="button"
            @click="post"
          >
            Send
          </button>
          <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            閉じる
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    card: {
      type: String,
      default: ''
    },
    cardid: {
      type: String,
      default: ''
    },
    modalId: {
      type: String,
      default: ''
    },
    exampleModalLabel: {
      type: String,
      default: ''
    },
    exampleModalLabelId: {
      type: String,
      default: ''
    }
    // arialabelledby: String,
    // cardId: String,
  },
  data: () => ({
    modalId: '',
    card: '',
    cardid: ''
  }),
  created: function () {
    // console.log(this.card)
    // console.log(this.card2.id)
  },
  mounted: function () {
    this.card = JSON.parse(this.card)
    // this.ardid = this.card.id;
  },
  methods: {
    post: function (event) {}
  }
  // mounted: function () {
  // axios.get('/api/score/u/jason/13143214')
  //   .then(res => {
  //     this.result = res.data[0]['result']
  //     // winner = res.data[0]['winner']
  //     // score = res.data[1]['score']
  //     console.log('axios mounted.')
  //     console.log(res.status, res.statusText, res.data);
  //     // => 200, "OK", { message: "You just sent the data!" }
  //   })
  // }
}
</script>
