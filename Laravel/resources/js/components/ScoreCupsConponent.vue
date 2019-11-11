<template>
        <div class="row">
            <div v-for="cup in dataCups" class="col-md-3">
                <a v-bind:href="'/score/' + cup.cup_number ">
                    <img class="card-img-top"
                         v-bind:src="'https://placehold.jp/888888/ffffff/800x600.png?text=' + cup.cup_name"
                         v-bind:alt="cup.cup_name"
                    >
                </a>
                <div class="card-body">
                    <h3 class="card-title">{{ cup.cup_name }}</h3>
                    <h4>subtitle</h4>
                    <p class="card-text">Description</p>
                </div>
            </div>
        </div>
</template>
<script>
    export default {
        props: {
            dataCups: String,
        },
        data: () => ({
            dataCups: '',
        }),
        mounted: function () {
            this.dataCups = JSON.parse(this.dataCups);
        },
    }
</script>

<style scoped>
</style>
