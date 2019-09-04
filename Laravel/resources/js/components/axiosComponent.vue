<template>
    <div id="weather">
        <p>result : {{ result }}</p>
    </div>
</template>


<script>
  export default {
    // created() {
    //   this.winner = 'test'
    // },
    props: {
      result: Boolean,
    },
    mounted: function () {
      axios.get('/api/score/u/jason/13143214')
        .then(res => {
          this.result = res.data[0]['result']
          // winner = res.data[0]['winner']
          // score = res.data[1]['score']
          console.log('axios mounted.')
          console.log(res.status, res.statusText, res.data);
          // => 200, "OK", { message: "You just sent the data!" }
        })
    }
  }
</script>