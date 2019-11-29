<template>
  <form>
    <div
      class="pb-3 mb-3 border-bottom border-light"
      :class="cssScoredBg"
    >
      <!--        <div v-if="getData.player_a_id !== null" class="pb-3 mb-3 border-bottom border-light">-->
      <!--            <div>cup Name : {{ cupName}} - EventName : {{ eventName }}</div>-->
      <div v-show="loading">
        <vue-loading
          type="spin"
          color="#fff"
          :size="{ width: '50px', height: '50px' }"
        />
      </div>
      <div v-show="!loading">
        <h3>
          {{ getData.round }}Round - {{ getData.card_number }} Game
        </h3>
        <template v-if="!isScored">
          <div class="row col-md-5 d-inline-block">
            Winnner : {{ getData.winner }}
            <div
              v-if="getData.player_a_id !== null"
              class="form-check"
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
              class="form-check"
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
        </template>
        <template v-else>
          <div class="row col-md-4 d-inline-block h4 ">
            {{ getData.player_a_name }}
          </div>
          <div class="col-md-2 d-inline-block">
            <div class="h3">
              {{ getData.score }}
            </div>
          </div>
          <div class="col-md-4 d-inline-block h4">
            {{ getData.player_b_name }}
          </div>
          <div class="col-md-2 d-inline-block text-right">
            <button
              type="button"
              class="d-block w-100"
              @click="modTournament"
            >
              Mod
            </button>
          </div>
        </template>
      </div>
    </div>
    <!--        {{ getData }}-->
  </form>
</template>
<script>
import { VueLoading } from 'vue-loading-template'

export default {
  components: {
    VueLoading
  },
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
    tournamentId: {
      type: Number,
      default: 0,
      required: true
    },
    token: {
      type: String,
      default: '',
      required: true
    }
  },
  data: () => ({
    loading: true,
    updateFlg: true,
    getCardUrl: '/api/score/get_tournament',
    postCardUrl: '/api/score/post_tournament',
    getCardEndPoint: '',
    postCardEndPoint: '',
    getData: '',
    isScored: false,
    messages: [],
      socket: io(process.env.MIX_NODE_HOST + ':' + process.env.MIX_NODE_PORT) // eslint-disable-line
  }),
  computed: {
    cssScoredBg: function () {
      if (this.isScored) {
        return 'bg-secondary text-white'
        // return ''
      } else {
        return null
      }
    }
  },
  mounted: function () {
    this.loadingOn()
    this.getTournament()
    this.socket.on('LaravelGetScoreMess', data => {
      var jsonData = JSON.parse(data)
      // this.messages = [...this.messages, data];
      var winnerText = ''
      for (let i = 0; i < jsonData.winner.length; i++) {
        winnerText += '<span>' + jsonData.winner[i] + '</span>'
        // console.log(obj.winner[i])
      }
      // this.messages = [...this.messages, {score: data['score'], winner: winnerText}];
      this.messages = [
        this.messages,
        {
          score: jsonData.score,
          winner: winnerText
        }
      ]
      if (this.tournamentId === jsonData.tournamentId) {
        this.updateFlg = false
        this.loadingOn()
        // setTimeout( this.loadingOn, 5000);
        // console.log(data.tournamentId);
        // console.log(data.cupId);
        // console.log(data.cupName);
        // console.log(data.eventId);
        // console.log(data.eventName);
        // console.log(data.roundNumber);
        // console.log(data.cardNumber);
        this.updateFlg = true
        setTimeout(this.getTournament, 2000)
      }
      // console.log(data.message);

      // this.from_api_name = data.name,
      //   this.from_api_message = data.message,
      // this.show = true;
      // setTimeout(this.noticeClose, 5000);
      // console.log('pull!');
    })
    // this.$nextTick(function () {
    //    // this.loadingOff()
    //     alert('test')
    // })
  },
  updated: function () {
    if (this.updateFlg) {
      this.loadingOff()
    }
  },
  methods: {
    postTournament: function (event) {
      this.updateFlg = false
      this.loadingOn()
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
        // this.getTournament()
    },
    getTournament: function (event) {
      this.getCardEndPoint =
          this.getCardUrl +
          '/' +
          this.tournamentId +
          '?api_token=' +
          this.token
      // alert(this.getCardEndPoint)
        axios // eslint-disable-line
        .get(this.getCardEndPoint)
        .then(response => {
          this.getData = response.data
          console.log(this.getData)
          // alert(this.getData)
          if (this.getData.score !== null) {
            this.isScored = true
          }
        })
        .catch(error => console.log(error))
    },

    modTournament: function () {
      this.isScored = false
    },
    loadingOff: function () {
      this.loading = false
    },
    loadingOn: function () {
      this.loading = true
    }
  }
}
</script>

<style scoped></style>
