const http = require('http');
// CommonJS / ESM - Ecmascript
const { testFunction, newFunction } = require('./function');
const { error } = require('console');
// const { default: test } = require('node:test');

// Promise -> janji dari server bahwa dia akan mengirimkan data
const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('Sudah sampai');
            // reject('Saya kena tilang');
        }, 1000 * 5);
    });
}

// req : isi data yg dikirim oleh browser
// res : object yg kita kirim buat responsenya
var server = http.createServer(async (req, res) =>  {
    switch (req.url) {
        case '/about':
            console.log('Saya otw');
            //kalo result masuknya ke then, kalo reject masuknya ke catch
            // await -> menunggu response nya selesai
            const value = await printAgakTelat();
            console.log(value);
            console.log('Ngopi');
            res.write('Ini about');
            res.end();
            break;
        case '/contact':
            res.write('Ini contact');
            res.end();
            break;
        default:
            res.write('404 Not Found');
            res.end();
    }
    
    // if (req.url == '/about') {
    //     res.write('Ini about');
    //     res.end();
    // } else {
    //     res.write('404 Not Found');
    //     res.end();
    // }
});

const port = 3000;
server.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}`);
});