const http = require('http');

var server = http.createServer((req, res) => {
    tugasFunction()
})

const port = 2000;
server.listen(port, () =>
    console.log(`Server berjalan di http://localhost:${port}`)    
    );