<template>
    <form>
    <div v-if="tournament.player_a_id !== null" class="pb-3 mb-3 border-bottom border-light">
        <h3>{{ tournament.round }}Round - {{tournament.card_number}} Game</h3>
        <div class="row">
            <div class="row col-md-5 d-inline-block pl-5">
                Winnner
                <div class="">
                    <input v-model="winner" type="radio" id="radio1" class="form-check-input"
                           name="winner"
                           v-bind:value="tournament.player_a_id"
                           >
                    <label class="form-check-label" for="radio1">
                        {{ tournament.player_a_name }}
                    </label>
                </div>
                <div class="">
                    <input v-model="winner" type="radio" id="radio2" class="form-check-input"
                           name="winner"
                           v-bind:value="tournament.player_b_id"
                           >
                    <label class="form-check-label" for="radio1">
                        {{ tournament.player_b_name }}
                    </label>
                </div>
            </div>
            <div class="col-md-3 d-inline-block">
                Score
                <input v-model="score" type="text" name="score">
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
    </form>
</template>
<script>
    export default {
        props: {
            tournament: String,
            token: String,
        },
        data: () => ({
            tournament: '',
            token: '',
            tournamentId: '',
            winner: '',
            score: '',
            url: '/api/score/post_tournament',
            endPoint: '',
        }),
        methods: {
            postTournament: function (event) {
                this.endPoint = this.url + '?api_token=' + this.token
                // alert(this.endPoint);
                axios.post(this.endPoint, {
                    tournamentId: this.tournament.id,
                    winner: this.winner,
                    score: this.score
                })
                    .then(function (response) {
                        console.log(response.data)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },

        }
    }
</script>

<style scoped>
</style>
