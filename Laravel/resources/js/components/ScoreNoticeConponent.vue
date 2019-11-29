<template>
  <v-container
    v-show="show"
    grid-list-md
  >
    <h2>RealNotice</h2>
    <v-layout>
      <!-- Display Noice -->
      <v-flex
        offset-xs1
        xs7
      >
        <v-list three-line>
          <v-subheader>Game Result</v-subheader>
          <div
            v-for="row in messages"
            :key="row.winner"
          >
            <v-list-tile>
              <v-list-tile-content class="bg-danger text-white">
                <v-list-tile-sub-title>
                  Score : <span>{{ row.score }}</span>
                </v-list-tile-sub-title>
                <v-list-tile-title>
                  Win : <span>{{ row.winner }}</span>
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </div>
        </v-list>
      </v-flex>
    </v-layout>
  </v-container>
</template>
<style>
  .v-leave-active,
  .v-enter-active {
    transition: opacity 1s;
  }

  .v-enter,
  .v-leave-to {
    opacity: 0;
  }
</style>

<script>
/* eslint no-mixed-spaces-and-tabs: "error" */
export default {
  data: () => ({
    name: '',
    message: '',
    from_api_name: '',
    from_api_message: '',
    messages: [],
    show: false,
      socket: io(process.env.MIX_NODE_HOST + ':' + process.env.MIX_NODE_PORT) // eslint-disable-line
  }),
  mounted: function () {
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
      console.log(data.name)
      console.log(data.message)

      // this.from_api_name = data.name,
      //   this.from_api_message = data.message,
      this.show = true
      setTimeout(this.noticeClose, 5000)
    })
  },
  methods: {
    noticeClose: function () {
      this.show = false
    }
  }
}
</script>

<style scoped></style>
