<template>
    <v-container grid-list-md v-show="show">
        <h2>RealNotice</h2>
        <v-layout>
            <!-- Display Noice -->
            <v-flex offset-xs1 xs7>
                <v-list three-line>
                    <v-subheader>Game Result</v-subheader>
                    <template v-for="(row, index) in messages">
                        <template>
                            <v-list-tile>
                                <v-list-tile-content class="bg-danger text-white">
                                    <v-list-tile-sub-title>Score : <span v-html="row.score"></span>
                                    </v-list-tile-sub-title>
                                    <v-list-tile-title>Win : <span v-html="row.winner"></span></v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </template>
                    </template>
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
  export default {
    data: () => ({
      name: '',
      message: '',
      from_api_name: '',
      from_api_message: '',
      messages: [],
      show: false,
      socket: io('laravel.centos75.exp:3000')
    }),
    mounted: function () {
      this.socket.on('LaravelGetScoreMess', (data) => {
        var data = JSON.parse(data);
        // this.messages = [...this.messages, data];
        var winnerText = '';
        for (let i = 0; i < data.winner.length; i++) {
          winnerText += '<span>' + data.winner[i] + '</span>'
          // console.log(obj.winner[i])
        }
        this.messages = [...this.messages, {score: data['score'], winner: winnerText}];
        console.log(data.name);
        console.log(data.message);
        // this.from_api_name = data.name,
        //   this.from_api_message = data.message,
        this.show = true;
        setTimeout(this.noticeClose, 5000);
        console.log('pull!');
      })
    },
    methods: {
      noticeClose: function () {
        this.show = false;
      }
    }
  }
</script>

<style scoped>
</style>