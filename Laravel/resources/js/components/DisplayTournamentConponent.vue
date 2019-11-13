<template>
    <form>
    <div class="pb-3 mb-3 border-bottom border-light">
<!--        <div v-if="getData.player_a_id !== null" class="pb-3 mb-3 border-bottom border-light">-->
        <h3>{{ getData.round }}Round - {{getData.card_number}} Game</h3>
        <div class="row">
            <div class="row col-md-5 d-inline-block pl-5">
                Winnner : {{ getData.winner }}
                <div class="">
                    <input v-model="getData.winner" type="radio" id="radio1" class="form-check-input"
                           v-bind:value="getData.player_a_id"
                           >
                    <label class="form-check-label" for="radio1">
                        {{ getData.player_a_name }}
                    </label>
                </div>
                <div class="">
                    <input v-model="getData.winner" type="radio" id="radio2" class="form-check-input"
                           v-bind:value="getData.player_b_id"
                           >
                    <label class="form-check-label" for="radio1">
                        {{ getData.player_b_name }}
                    </label>
                </div>
            </div>
            <div class="col-md-3 d-inline-block">
                Score
                <input v-model="getData.score" type="text" name="score">
            </div>
            <div class="col-md-2 d-inline-block ">
                <button class="d-block w-100">Retire</button>
                <button class="d-block w-100">NotPlay</button>
            </div>
            <div class="col-md-2 d-inline-block text-right">
                <button type="button" v-on:click="postTournament" class="d-block w-100">Send</button>
            </div>
        </div>
    </div>
<!--        {{ getData }}-->
    </form>
</template>
<script>
    export default {
        props: {
            tournament: String,
            token: String,
        },
        data: () => ({
            getCardUrl: '/api/score/get_card',
            postCardUrl: '/api/score/post_tournament',
            getCardEndPoint: '',
            postCardEndPoint: '',
            getData: '',
        }),
        methods: {
            postTournament: function (event) {
                this.postCardEndPoint = this.postCardUrl + '?api_token=' + this.token
                // alert(this.endPoint);
                axios.post(this.postCardEndPoint, {
                    tournamentId: this.getData.id,
                    winner: this.getData.winner,
                    score: this.getData.score
                })
                    .then(function (response) {
                        console.log(response.data)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
        },
        mounted: function(){
                this.getCardEndPoint = this.getCardUrl + '/' + this.tournament.id + '?api_token=' + this.token
                // alert(this.getCardEndPoint)
                axios
                    .get(this.getCardEndPoint)
                    .then(response => {
                        this.getData = response.data
                        console.log(this.getData)
                        // alert(this.getData)
                    })
                    .catch(error => console.log(error))
        }
    }

</script>

<style scoped>
</style>
