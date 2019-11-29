<template>
  <form>
    <div class="pb-3 mb-3 border-bottom border-light">
      <!--        <div v-if="getData.player_a_id !== null" class="pb-3 mb-3 border-bottom border-light">-->
      <h3>{{ getData.round }}Round - {{ getData.card_number }} Game</h3>
      <!--            <div>cup Name : {{ cupName}} - EventName : {{ eventName }}</div>-->
      <div class="row">
        <div class="row col-md-5 d-inline-block pl-5">
          Winnner : {{ getData.winner }}
          <div
            v-if="getData.player_a_id !== null"
            class=""
          >
            <input
              id="radio1"
              v-model="getData.winner"
              type="radio"
              class="form-check-input"
              :value="getData.player_a_id"
            >
            <label
              class="form-check-label"
              for="radio1"
            >
              {{ getData.player_a_name }}
            </label>
          </div>
          <div v-else>
            Not regist yet.
          </div>
          <div
            v-if="getData.player_b_id !== null"
            class=""
          >
            <input
              id="radio2"
              v-model="getData.winner"
              type="radio"
              class="form-check-input"
              :value="getData.player_b_id"
            >
            <label
              class="form-check-label"
              for="radio1"
            >
              {{ getData.player_b_name }}
            </label>
          </div>
          <div v-else>
            Not regist yet.
          </div>
        </div>
        <div class="col-md-3 d-inline-block">
          Score
          <input
            v-model="getData.score"
            type="text"
            name="score"
          >
        </div>
        <div class="col-md-2 d-inline-block ">
          <button class="d-block w-100">
            Retire
          </button>
          <button class="d-block w-100">
            NotPlay
          </button>
        </div>
        <div class="col-md-2 d-inline-block text-right">
          <button
            type="button"
            class="d-block w-100"
            @click="postTournament"
          >
            Send
          </button>
        </div>
      </div>
    </div>
    <!--        {{ getData }}-->
  </form>
</template>
<script>
export default {
  props: {
    cupId: {
      type: Number, // 型の検査
      default: 0,
      required: true
    },
    cupName: {
      type: String,
      default: '',
      required: true
    },
    eventId: {
      type: Number,
      default: 0,
      required: true
    },
    eventName: {
      type: String,
      default: '',
      required: true
    },
    tournament: {
      type: String,
      default: '',
      required: true
    },
    token: {
      type: String,
      default: '',
      required: true
    }
  },
  data: () => ({
    getCardUrl: '/api/score/get_tournament',
    postCardUrl: '/api/score/post_tournament',
    getCardEndPoint: '',
    postCardEndPoint: '',
    getData: '',
    messages: [],
      socket: io(process.env.MIX_NODE_HOST + ':' + process.env.MIX_NODE_PORT) // eslint-disable-line
  }),
  mounted: function () {
    this.getTournament()
    this.socket.on('LaravelGetScoreMess', data => {
      var jsonData = JSON.parse(data)
      // this.messages = [...this.messages, data];
      var winnerText = ''
      for (let i = 0; i < data.winner.length; i++) {
        winnerText += '<span>' + data.winner[i] + '</span>'
        // console.log(obj.winner[i])
      }
      // this.messages = [...this.messages, {score: data['score'], winner: winnerText}];
      this.messages = [
        this.messages,
        { score: jsonData.score, winner: winnerText }
      ]
      if (this.tournament.id === data.tournamentId) {
        // console.log(data.tournamentId);
        console.log(data.cupId)
        console.log(data.cupName)
        console.log(data.eventId)
        console.log(data.eventName)
        console.log(data.roundNumber)
        console.log(data.cardNumber)
        this.getTournament()
      }
      // console.log(data.message);

      // this.from_api_name = data.name,
      //   this.from_api_message = data.message,
      // this.show = true;
      // setTimeout(this.noticeClose, 5000);
      // console.log('pull!');
    })
  },
  methods: {
    postTournament: function (event) {
      this.postCardEndPoint =
          this.postCardUrl + '?api_token=' + this.token
      // alert(this.endPoint);
        axios // eslint-disable-line
        .post(this.postCardEndPoint, {
          cupId: this.cupId,
          cupName: this.cupName,
          eventId: this.eventId,
          eventName: this.eventName,
          tournamentId: this.getData.id,
          roundNumber: this.getData.round,
          cardNumber: this.getData.card_number,
          winner: this.getData.winner,
          score: this.getData.score
        })
        .then(function (response) {
          console.log(response.data)
        })
        .catch(function (error) {
          console.log(error)
        })
      this.getTournament()
    },
    getTournament: function (event) {
      this.getCardEndPoint =
          this.getCardUrl +
          '/' +
          this.tournament.id +
          '?api_token=' +
          this.token
      // alert(this.getCardEndPoint)
        axios // eslint-disable-line
        .get(this.getCardEndPoint)
        .then(response => {
          this.getData = response.data
          console.log(this.getData)
          // alert(this.getData)
        })
        .catch(error => console.log(error))
    }
  }
}
</script>

<style scoped></style>
