var express = require('express');
var fs = require('fs');
var app = express();
app.use(express.logger());

var content=fs.readFileSync("index.html");

var buffer = new Buffer(16);
buffer.write("hello","utf-8");

app.get('/', function(request, response) {
  response.send(buffer.toString('utf-8'));
});

var port = process.env.PORT || 5000;
app.listen(port, function() {
  console.log("Listening on " + port);
});
