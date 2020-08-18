const app = require('express')();
const PORT = process.env.PORT || process.env.MIX_NODE_PORT;
const http = require('https');
const redis = require('socket.io-redis');
const fs = require('fs');
const socketIo = require('socket.io')();
const SSL_KEY = process.env.CERTS_DIR_PATH + 'server.key';
const SSL_CERT= process.env.CERTS_DIR_PATH + 'server.crt';
const sslOptions = {
  key: fs.readFileSync(SSL_KEY),
  cert: fs.readFileSync(SSL_CERT)
};
// const http = require('https').Server(ap);
var server = http.createServer(sslOptions, app);
// const io = require('socket.io')(http);
var io = socketIo.listen(server);
io.adapter(redis({ host: process.env.REDIS_HOST, port: process.env.REDIS_PORT }));
app.get(`/`, (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

io.on('LaravelGetScoreMess', (data) => {
  var obj =JSON.parse(data);
});
io.on('connection', function(socket,data) {
  // console.log(`a user connected[id:${ socket.id },mess:${ data.message}]`);
  console.log('a user connected[id:',socket.id);
  console.log('data',data);
    socket.on('LaravelPostScoreMess', function(data) {
    io.emit('LaravelGetScoreMess',  data )
  });
});
server.listen(PORT,function(){
  console.log(process.env.PORT);
});

// http.listen(PORT, () => {
//   console.log(`listening on *:${PORT}`);
// });
// http.listen(PORT, {
//   key  : fs.readFileSync(SSL_KEY).toString(),
//   cert : fs.readFileSync(SSL_CERT).toString()
// });
// http.createServer(sslOptions, app).listen(PORT);
