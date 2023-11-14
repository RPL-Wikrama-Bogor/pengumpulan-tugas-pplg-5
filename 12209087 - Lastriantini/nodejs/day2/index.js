const http = require('http');
const { newFunction, testFunction } = require('./function');
// commonJS / ESM - Ecmascript

// PROMISE 
const printAgakTelat = () => {
    return new Promise((resolve, reject) =>{
        setTimeout(() => {
            resolve('Sudah Sampai');
            // reject('Saya kena tilang');
        }, 1000 * 5); //berapa delay nya, per detik (5 detik)
    });
}

// listener/callback adalah function
var server = http.createServer(async(req, res) => {
    // req.url  // /about
    switch (req.url) {
        case '/about':
            console.log('Saya otw');
            const value = await
            printAgakTelat();
            console.log(value);
            console.log('Ngopi')
            // .catch((error) => console.log(error));
            res.write('ini about');
            res.end();
            break;
        case '/contact':
            res.write('ini contact');
            res.end();
            break;
        default:
            res.write('404 Not found');
            res.end();
            break;
    };

    // if (req.url == '/about') {
    //     res.write('ini about');
    //     res.end();
    // } else if (req.url == '/contact') {
    //     res.write('404 Not found');
    //     res.end();
    // } else {
    //     res.write('404 Not found');
    //     res.end();
    // }
    // res.write('hello wolrd!');
    // res.end();
});

const port = 3000;
server.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}`);
});