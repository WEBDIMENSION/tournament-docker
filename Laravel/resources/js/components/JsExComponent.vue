<template>
    <div>
        <vue-loading v-show="loading" type="spin" color="0000ff"
                     :size="{ width: '50px', height: '50px' }"></vue-loading>
        {{ data }}
        <div>
            {{ rounds }}
        </div>
        <div>
            RoundCount : {{ rounds.length }}
        </div>
        <div v-for="record in data">
            {{record.round}}R-{{record.card_number}}Game
        </div>
        {{ group }}
        <div v-for="a, index in group" class="border-bottom">
            {{ index + 1 }}R
            <div v-for="b in a">

                {{ b.card_number }}Game
            </div>
        </div>
    </div>
</template>
<script>
    import {VueLoading} from 'vue-loading-template'

    export default {
        components: {
            VueLoading
        },
        props: {
            test: String,
        },
        data: () => ({
            loading: true,
            air: 'this is test',
            rounds: '',
            group: [],
            data: JSON.parse('[{"id":1,"event_id":1,"round":1,"card_number":1,"player_a_id":1,"player_a_name":"\u4e2d\u6d25\u5ddd \u88d5\u592a : \u897f\u4e4b\u5712 \u592a\u4e00","player_b_id":2,"player_b_name":"\u9ad8\u6a4b \u5b66 : \u5c0f\u6797 \u62d3\u771f","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":2,"event_id":1,"round":1,"card_number":2,"player_a_id":3,"player_a_name":"\u7530\u8fba \u5065\u4e00 : \u4e2d\u5cf6 \u7be4\u53f8","player_b_id":4,"player_b_name":"\u4e2d\u6751 \u5343\u4ee3 : \u6e21\u8fba \u6843\u5b50","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":3,"event_id":1,"round":1,"card_number":3,"player_a_id":5,"player_a_name":"\u5742\u672c \u6d69 : \u4e95\u9ad8 \u7a14","player_b_id":6,"player_b_name":"\u4f50\u3005\u6728 \u7a14 : \u4e2d\u6751 \u7a14","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":4,"event_id":1,"round":1,"card_number":4,"player_a_id":7,"player_a_name":"\u5927\u57a3 \u88d5\u7f8e\u5b50 : \u5c71\u53e3 \u592a\u4e00","player_b_id":8,"player_b_name":"\u82e5\u677e \u82b1\u5b50 : \u4f50\u3005\u6728 \u592a\u90ce","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":5,"event_id":1,"round":1,"card_number":5,"player_a_id":9,"player_a_name":"\u6d25\u7530 \u7ffc : \u5927\u57a3 \u4fee\u5e73","player_b_id":10,"player_b_name":"\u4e09\u5b85 \u4e03\u590f : \u9752\u7530 \u7d50\u8863","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":6,"event_id":1,"round":1,"card_number":6,"player_a_id":11,"player_a_name":"\u5bae\u6ca2 \u4e03\u590f : \u677e\u672c \u3042\u3059\u304b","player_b_id":12,"player_b_name":"\u85e4\u672c \u76f4\u5b50 : \u9ad8\u6a4b \u4fee\u5e73","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":7,"event_id":1,"round":1,"card_number":7,"player_a_id":13,"player_a_name":"\u4e95\u4e0a \u82b1\u5b50 : \u8fd1\u85e4 \u4eac\u52a9","player_b_id":14,"player_b_name":"\u52a0\u85e4 \u77e5\u5b9f : \u5409\u672c \u7f8e\u52a0\u5b50","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":8,"event_id":1,"round":1,"card_number":8,"player_a_id":15,"player_a_name":"\u4f50\u3005\u6728 \u9999\u7e54 : \u5de5\u85e4 \u6cbb","player_b_id":16,"player_b_name":"\u5bae\u6ca2 \u7f8e\u52a0\u5b50 : \u5ee3\u5ddd \u77e5\u5b9f","score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":9,"event_id":1,"round":2,"card_number":1,"player_a_id":null,"player_a_name":null,"player_b_id":null,"player_b_name":null,"score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":10,"event_id":1,"round":2,"card_number":2,"player_a_id":null,"player_a_name":null,"player_b_id":null,"player_b_name":null,"score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":11,"event_id":1,"round":2,"card_number":3,"player_a_id":null,"player_a_name":null,"player_b_id":null,"player_b_name":null,"score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":12,"event_id":1,"round":2,"card_number":4,"player_a_id":null,"player_a_name":null,"player_b_id":null,"player_b_name":null,"score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":13,"event_id":1,"round":3,"card_number":1,"player_a_id":null,"player_a_name":null,"player_b_id":null,"player_b_name":null,"score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":14,"event_id":1,"round":3,"card_number":2,"player_a_id":null,"player_a_name":null,"player_b_id":null,"player_b_name":null,"score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"},{"id":15,"event_id":1,"round":4,"card_number":1,"player_a_id":null,"player_a_name":null,"player_b_id":null,"player_b_name":null,"score":null,"winner":null,"work_over":null,"created_at":"2019-11-15 07:00:24","updated_at":"2019-11-15 07:00:24"}]')
        }),
        mounted: function () {
            this.rounds = this.data.reduce(function (result, current) {
                var element = result.find(function (p) {
                    return p.round === current.round
                });
                if (element) {
                    element.count++; // count
                } else {
                    result.push({
                        round: current.round,
                        count: 1,
                    });
                }
                return result;
            }, []);
            this.group = new Array(this.rounds.length);
            for (i = 0; i < this.group.length; i++) {
                this.group[i] = []
            }
            for (var i = 0; i < this.data.length; i++) {
                this.group[this.data[i].round - 1].push(this.data[i]);
                // this.group.push(this.data[i]);
                // alert(i)
                // this.group.push(i);
            }
            // alert(roundsArray.length)
            setTimeout(this.loadingOff, 5000);


        },
        methods: {
            loadingOff: function (event) {
                this.loading = false
            },
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
        },

    }
</script>
