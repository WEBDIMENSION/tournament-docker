<template>
    <p>Vue.js : {{ message }}</p>
</template>

<script>
    export default {
        props: {
            message: String,
        },
        mounted() {
            console.log('Sample mounted.')
        },
    }
</script>
