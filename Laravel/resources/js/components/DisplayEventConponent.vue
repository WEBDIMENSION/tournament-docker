<template>
    <div>
        <li class="nav-item bg-primary mb-2 list-group-item-action " v-on:click="getTournament">
            <a class="nav-link row d-block">
                <span class="col-md-7 d-inline-block">{{ eventName }}</span><span
                class="col-md-5 text-right d-inline-block">                Player数:{{ playersCount }} SetCount:{{ setCount }} TieBeak:{{ tiebreak }}</span></a>
        </li>
        <div v-for="tournament in tournaments" :key="tournament.round">
            <display-tournament-component
                v-bind:tournament="tournament"
                v-bind:token="token"
            ></display-tournament-component>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            cupId: String,
            eventName: String,
            eventNumber: String,
            playersCount: String,
            setCount: String,
            rule: String,
            tiebreak: String,
            url: String,
            token: String,
        },
        data: () => ({
            cupId: '',
            eventName: '',
            eventNumber: '',
            playersCount: '',
            setCount: '',
            rule: '',
            tiebreak: '',
            url: '',
            result: '',
            tournaments: '',
            token: '',
        }),
        methods: {
            getTournament: function (event) {
                // alert(this.url)
                axios
                    .get(this.url + '?api_token=' + this.token)
                    .then(response => {
                        this.tournaments = response.data
                        console.log(this.result)
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>

<style scoped>
</style>
