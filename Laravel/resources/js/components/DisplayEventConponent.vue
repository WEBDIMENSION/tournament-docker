<template>
    <div>
        <li class="nav-item bg-primary mb-2 list-group-item-action ">
            <!--        <li class="nav-item bg-primary mb-2 list-group-item-action " v-on:click="getTournaments">-->
            <a class="nav-link row d-block">
                <span class="col-md-7 d-inline-block">{{ eventName }}</span><span
                class="col-md-5 text-right d-inline-block">                Player数:{{ playersCount }} SetCount:{{ setCount }} TieBeak:{{ tiebreak }}</span></a>
        </li>
        <ul class="nav nav-tabs" id="roundsTab" role="tablist">
            <li v-for="roundNumber in rounds.length" class="nav-item">
                <a class="nav-link active"
                   v-bind:id="roundNumber"
                   data-toggle="tab"
                   v-bind:href="'#' + roundNumber"
                   role="tab"
                   v-bind:aria-controls="roundNumber"
                   aria-selected="false"
                >
                    {{ roundNumber }}R</a>
            </li>
        </ul>
        <!--        <div v-for="round in rounds" :key="round.round">-->
        <!--        {{ round.count }}-->
        <!--        </div>-->
        <div class="tab-content mt-3" id="roundTabContent">
            <div v-for="tournament in tournaments" :key="tournament.round"
                 class="tab-panel fade show active"
                 v-bind:id="tournament.round"
                 v-bind:="tabpanel"
                 v-bind:aria-lavelledby="tournament.round"
            >
                <display-tournament-component
                    v-bind:cup-id="cupId"
                    v-bind:cup-name="cupName"
                    v-bind:event-id="eventId"
                    v-bind:event-name="eventName"
                    v-bind:tournament="tournament"
                    v-bind:token="token"
                ></display-tournament-component>
            </div>
        </div>

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
                        console.log(this.events)
                    })
                    .catch(error => console.log(error))
                // alert(this.tournaments)
            },
        },
        mounted: function () {
            this.getTournaments()
        }
    }
</script>

<style scoped>
</style>
