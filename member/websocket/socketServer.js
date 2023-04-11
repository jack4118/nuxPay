const fs = require('fs');
var http = require('http');

var filename = 'include/config.json';
var contents = fs.readFileSync(filename);
var jsonContent = JSON.parse(contents);

// var serverPort = 8079;
var serverPort = jsonContent.socket_port;

// var server = https.createServer(options);
var server = http.createServer();
const io1 = require("socket.io")(server,{
    cors: {        
        origin: '*',
      }
});


// new connection
io1.on('connection', function(socket) {    
    
    socket.on('request', function(data) {    
        console.log(data);
        console.log('request')   
        client.emit('request', {common_symbol: data.common_symbol, table: data.table })      
    });
	    

});



server.listen(serverPort);

// connect to existing 
var ioc = require( 'socket.io-client' );
//var client = ioc.connect( "http://admin.newnuxpaybackend.com" );
//  var client = ioc.connect( "http://localhost:8080" );
 var client = ioc.connect( jsonContent.connect_to );

client.on('ETHBTC', function(data) {    
    console.log(data);
    if(io1){
        io1.emit('ETHBTC', data);
    }
});

client.onAny(function(event,data) {
    // console.log(event);
    // console.log(data);
    // socket.broadcast.emit(event, data);
    if(io1){
        io1.emit(event, data);
    }
});
