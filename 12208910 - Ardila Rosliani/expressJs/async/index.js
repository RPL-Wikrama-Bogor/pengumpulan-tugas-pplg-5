const http = require('http'); //untuk mengimport
const { newFunction, testFunction } = require('./function');
// nyambung dengan file function.js

const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('Sudah sampai');
            // reject('Saya kena tilang ');
        }, 1000 * 5);
    });
}

var server = http.createServer(async (req, res) => {
    switch (req.url) {
        case '/about':
            console.log('Saya otw');
            
            const value = await printAgakTelat();
            console.log(value);
            console.log('Ngopi');
            
            res.write('Ini About');
            res.end();
            break;
        case '/contact':
            res.write('Ini Contact');
            res.end();
            break;
        default:
            res.write('404 Not Found');
            res.end();
            break;
    }
});

const port = 3000;
server.listen(port, () => {
    console.log(`Server Berjalan di http://localhost:${port}`);
});