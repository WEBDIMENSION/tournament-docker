<template>
  <p>Vue.js : {{ message }}</p>
</template>

<script>
export default {
  props: {
    message: {
      type: String,
      default: ''
    }
  },
  mounted () {
    console.log('Sample mounted.')
  }
}
</script>
