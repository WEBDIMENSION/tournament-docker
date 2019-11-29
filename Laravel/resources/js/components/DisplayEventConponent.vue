<template>
  <div>
    <!--        {{ tournaments }}-->
    <!--        {{ rounds.length }}-->
    <div class="">
      <!--        <li class="nav-item bg-primary mb-2 list-group-item-action " v-on:click="getTournaments">-->
      <span class="col-md-7 d-inline-block">{{ eventName }}</span>
      <span class="col-md-5 text-right d-inline-block">
        Player数:{{ playersCount }} SetCount:{{ setCount }} TieBeak:{{ tiebreak }}
      </span>
    </div>
    <main class="p-3">
      <ul class="nav nav-tabs">
        <li
          v-for="(roundNumber, index ) in rounds.length"
          :key="index"
          class="nav-item"
        >
          <a
            :id="'er' + eventNumber + roundNumber"
            :class="['nav-link', {'active':index === 0} ]"
            data-toggle="tab"
            :href="'#tab-link' + eventNumber + roundNumber"
            role="tab"
            :aria-controls="eventNumber + roundNumber"
            :aria-selected="[index === 0 ? 'true' : 'false']"
          >
            {{ roundNumber }}R</a>
        </li>
      </ul>
      <div
        :id="'roundsTab' + eventNumber + 'Content'"
        class="tab-content mt-3"
      >
        <div
          v-for="(a, index) in tournamentGroup"
          :id="'tab-link' + eventNumber + String(index + 1)"
          :key="index"
          :class="['tab-pane', 'fade', {'show':index === 0}, {'active':index === 0} ]"
          role="tabpanel"
          :aria-labelledby="eventNumber + String(index + 1)"
        >
          <div
            v-for="(b) in a"
            :key="b.id"
          >
            <display-tournament-component
              :cup-id="cupId"
              :cup-name="cupName"
              :event-id="eventId"
              :event-name="eventName"
              :tournament-id="b.id"
              :token="token"
            />
          </div>
        </div>
        <!--            <div v-for="b in a">-->
        <!--                {{ b.card_number }}Game-->
        <!--            </div>-->
      </div>
    </main>

    <!--        <div class="tab-content mt-3" id="roundTabContent">-->
    <!--            <div v-for="tournament in tournaments" :key="tournament.round"-->
    <!--                 class="tab-panel fade show active"-->
    <!--                 v-bind:id="tournament.round"-->
    <!--                 v-bind:="tabpanel"-->
    <!--                 v-bind:aria-lavelledby="tournament.round"-->
    <!--            >-->
    <!--                <display-tournament-component-->
    <!--                    v-bind:cup-id="cupId"-->
    <!--                    v-bind:cup-name="cupName"-->
    <!--                    v-bind:event-id="eventId"-->
    <!--                    v-bind:event-name="eventName"-->
    <!--                    v-bind:tournament="tournament"-->
    <!--                    v-bind:token="token"-->
    <!--                ></display-tournament-component>-->
    <!--            </div>-->
    <!--        </div>-->
  </div>
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
    eventNumber: {
      type: Number,
      default: 0,
      required: true
    },
    playersCount: {
      type: Number,
      default: 0,
      required: true
    },
    setCount: {
      type: Number,
      default: 0,
      required: true
    },
    rule: {
      type: String,
      default: '',
      required: true
    },
    tiebreak: {
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
    url: '/api/score/get_tournaments',
    getTournamentsEndPoint: '',
    tournaments: '',
    rounds: '',
    tournamentGroup: ''
  }),
  mounted: function () {
    this.getTournaments()
  },
  methods: {
    getTournaments: function (event) {
      this.getTournamentsEndPoint = this.url + '/' + this.eventNumber + '?api_token=' + this.token
      // alert(this.getTournamentsEndPoint)
        axios // eslint-disable-line
        .get(this.getTournamentsEndPoint)
        .then(response => {
          this.tournaments = response.data
          this.rounds = this.tournaments.reduce(function (result, current) {
            var element = result.find(function (p) {
              return p.round === current.round
            })
            if (element) {
              element.count++ // count
            } else {
              result.push({
                round: current.round,
                count: 1
              })
            }
            return result
          }, [])
          this.tournamentGroup = new Array(this.rounds.length)
          // alert(this.rounds.length)
          for (var i = 0; i < this.tournamentGroup.length; i++) {
            this.tournamentGroup[i] = []
          }
          for (var j = 0; j < this.tournaments.length; j++) {
            this.tournamentGroup[this.tournaments[j].round - 1].push(this.tournaments[j])
          }
          // console.log(this.rounds)
        })
        .catch(error => console.log(error))
        // this.makeTournamentGroup()
    }
    // makeTournamentGroup: function (){
    //     this.tournamentGroup = new Array(this.rounds.length);
    //     alert(this.rounds.length)
    //     for (var i = 0; i < this.tournamentGroup.length; i++) {
    //         this.tournamentGroup[i] = []
    //     }
    //     for (var i = 0; i < this.tournaments.length; i++) {
    //         this.tournamentGroup[this.tournaments[i].round - 1].push(this.tournaments[i]);
    //     }
    //
    // }
  }
}
</script>

<style scoped>
</style>
