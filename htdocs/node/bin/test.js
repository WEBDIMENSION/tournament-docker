const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const PORT = process.env.PORT || 3000;
var redis = require('socket.io-redis');
io.adapter(redis({ host: 'redis', port: 6379 }));

app.get(`/`, (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

io.on('LaravelGetScoreMess', (data) => {
  var obj =JSON.parse(data);
});
io.on('connection', function(socket) {
  // console.log(`a user connected[id:${ socket.id },mess:${ data.message}]`)
  socket.on('LaravelPostScoreMess', function(data) {
    io.emit('LaravelGetScoreMess',  data )
  });
});


http.listen(PORT, () => {
  console.log(`listening on *:${PORT}`);
});