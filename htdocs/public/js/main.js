var sake = new Vue({
  el: '#sake',
  data: {
    sake: [
      "正月で",
      "豆まきで",
      "ひな祭りで",
      "花見で",
      "子供の日で",
      "田植えで",
      "七夕で",
      "暑いから",
      "台風で",
      "運動会で",
      "何でもないけど",
      "ドサクサで",
    ]
  }
})

var score = new Vue({
  el: '#weather2',
  data : {
      winner: 'test',
      score: 'test'
  },
  mounted : function() {
    axios.get('/api/score/u/akira/13143214')
      .then(response => {
      this.winner = response.data[0]['winner']
      this.score = response.data[1]['score']
      console.log(response.status, response.statusText, response.data)
      console.log(response.data[0]['winner'])
    console.log('axios2 mounted.')
      // => 200, "OK", { message: "You just sent the data!" }
    })
  }
})

