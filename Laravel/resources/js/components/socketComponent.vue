<template>
    <v-container grid-list-md>
        <h2>RealTimeChat</h2>
        <div class="row" v-if="show">
            <p class="mr-auto">name:{{ from_api_name}}</p>
            <p class="v">mess:{{ from_api_message }}</p>
        </div>
        <!--        <v-text-field label="名前" type="text" v-model="form_api_name"></v-text-field>-->
        <!--        <v-text-field label="投稿内容" type="text" v-model="form_api_message"></v-text-field>-->

        <!-- 投稿フォーム -->
        <v-layout>
            <v-flex xs4>
                <form @submit.prevent="sendMessage">
                    <v-card>
                        <v-card-title>
                            送信フォーム
                        </v-card-title>
                        <v-card-text>
                            <v-text-field label="名前" type="text" v-model="name"></v-text-field>
                            <v-text-field label="投稿内容" type="text" v-model="message"></v-text-field>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn type="submit" color="blue" dark>送信</v-btn>
                        </v-card-actions>
                    </v-card>
                </form>
            </v-flex>

            <!-- チャットの表示 -->
            <v-flex offset-xs1 xs7>
                <v-list three-line>
                    <v-subheader>チャット</v-subheader>
                    <template v-for="(row, index) in messages">
                        <template v-if="index == 0 || row.name !== messages[index-1].name">
                            <v-divider></v-divider>
                            <v-list-tile>
                                <v-list-tile-avatar>
                                    <!--                                <v-img src="/default.png"></v-img>-->
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-sub-title v-html="row.name"></v-list-tile-sub-title>
                                    <v-list-tile-title v-html="row.message"></v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </template>
                        <template v-else>
                            <v-list-tile>
                                <v-list-tile-avatar>
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-sub-title v-html="row.name"
                                                           v-if="index == 0 || row.name !== messages[index-1].name "></v-list-tile-sub-title>
                                    <v-list-tile-title v-html="row.message"></v-list-tile-title>
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
    // socket : io('laravel.centos75.exp:3000'),
    data: () => ({
      name: '',
      message: '',
      from_api_name: '',
      from_api_message: '',
      messages: [],
      show: false,
      socket: io('laravel.centos75.exp:3000'),
    }),
    methods: {
      sendMessage(e) {
        e.preventDefault();
        this.socket.emit('LaravelPostScoreMess',
          '{"name":"' + this.name + '","message":"' + this.message + '"}'
        );
        this.message = ''
      },
    },
    mounted: function () {
      this.socket.on('LaravelGetScoreMess', (data) => {
        var data =JSON.parse(data);
        this.messages = [...this.messages, data];
        console.log(data.name);
        console.log(data.message);
        this.from_api_name = data.name,
          this.from_api_message = data.message,
          this.show = true,
          // setTimeout(this.show = false, 3000);
          console.log('pull!');
      }),
        axios.get('/api/score/u/jason/13143214')
          .then(function (res) {
            // console.log('socket mounted.')
            // console.log(res.data[0]['result']);
            if (res.data[0]['result']) {
              console.log('in if start', res.data[0]['result']);
              this.name = 'aiuxxxxx', //初期テストデータ
                this.message = 'messxxxxx',//初期テストデータ
                this.socket.emit('LaravelPostScoreMess',
                  // {name: this.name, message: this.message}
                  // {name: this.name, message: this.message}
                  '{"name":"sample","message":"From Sample"}'
                );
              console.log('connected!');
              console.log(this.name);
              console.log(this.message);
              console.log('in if end');
            }
            console.log('socket mounted.');
            // console.log(res.status, name);
            // => 200, "OK", { message: "You just sent the data!" }
          }.bind(this))
    }

    // console.log(name,message);

    // .then(res => {
    //   // this.result = res.data[0]['result']
    //   if(res.data[0]['result'] === true){
    //     this.socket.emit('POST_MESSAGE', {
    //       name: 'bot',
    //       message: 'ret true'
    //     });
    //     this.message = ''
    //   }
    // winner = res.data[0]['winner']
    // score = res.data[1]['score']
    //   sendMessage(e) {
    //     e.preventDefault();
    //     this.socket.emit('POST_MESSAGE', {
    //       name: this.name,
    //       message: this.message
    //     });
    //     this.message = ''
    //   },
    // },
    // mounted(){
    //   // 投稿されたデータの取得
    //   this.socket.on('MESSAGE', (data) => {
    //     this.messages = [...this.messages, data];
    //   })
    // },
  }
</script>

<style scoped>
</style>