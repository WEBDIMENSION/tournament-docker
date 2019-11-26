<template>
    <div>

        <!--        {{ tournaments }}-->
        <!--        {{ rounds.length }}-->
        <div class="">
            <!--        <li class="nav-item bg-primary mb-2 list-group-item-action " v-on:click="getTournaments">-->
            <span class="col-md-7 d-inline-block">{{ eventName }}</span><span
            class="col-md-5 text-right d-inline-block">Player数:{{ playersCount }} SetCount:{{ setCount }} TieBeak:{{ tiebreak }}</span></a>
        </div>
        <main class="p-3">
            <ul class="nav nav-tabs">
                <li v-for="roundNumber,index in rounds.length" class="nav-item">
                    <a
                        v-bind:class="['nav-link', {'active':index === 0} ]"
                        v-bind:id="'er' + eventNumber + roundNumber"
                        data-toggle="tab"
                        v-bind:href="'#tab-link' + eventNumber + roundNumber"
                        role="tab"
                        v-bind:aria-controls="eventNumber + roundNumber"
                        v-bind:aria-selected="[index === 0 ? 'true' : 'false']"
                    >
                        {{ roundNumber }}R</a>
                </li>
            </ul>
            <div class="tab-content mt-3" v-bind:id="'roundsTab' + eventNumber + 'Content'">
                <div v-for="a, index in tournamentGroup"
                     v-bind:class="['tab-pane', 'fade', {'show':index === 0}, {'active':index === 0} ]"
                     v-bind:id="'tab-link' + eventNumber + String(index + 1)"
                     role="tabpanel"
                     v-bind:aria-labelledby="eventNumber + String(index + 1)">
                    <div v-for="b in a">
                        <display-tournament-component
                            v-bind:cup-id="cupId"
                            v-bind:cup-name="cupName"
                            v-bind:event-id="eventId"
                            v-bind:event-name="eventName"
                            v-bind:tournament-id="b.id"
                            v-bind:token="token"
                        ></display-tournament-component>
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
            cupId: String,
            cupName: String,
            eventId: String,
            eventName: String,
            eventNumber: String,
            playersCount: String,
            setCount: String,
            rule: String,
            tiebreak: String,
            token: String,
        },
        data: () => ({
            url: '/api/score/get_tournaments',
            getTournamentsEndPoint: '',
            tournaments: '',
            rounds: '',
            tournamentGroup: '',
        }),
        methods: {
            getTournaments: function (event) {
                this.getTournamentsEndPoint = this.url + '/' + this.eventNumber + '?api_token=' + this.token
                // alert(this.getTournamentsEndPoint)
                axios
                    .get(this.getTournamentsEndPoint)
                    .then(response => {
                        this.tournaments = response.data
                        this.rounds = this.tournaments.reduce(function (result, current) {
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
                        this.tournamentGroup = new Array(this.rounds.length);
                        // alert(this.rounds.length)
                        for (var i = 0; i < this.tournamentGroup.length; i++) {
                            this.tournamentGroup[i] = []
                        }
                        for (var i = 0; i < this.tournaments.length; i++) {
                            this.tournamentGroup[this.tournaments[i].round - 1].push(this.tournaments[i]);
                        }
                        // console.log(this.rounds)
                    })
                    .catch(error => console.log(error))
                // this.makeTournamentGroup()
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
        mounted: function () {
            this.getTournaments()
        }
    }
</script>

<style scoped>
</style>
