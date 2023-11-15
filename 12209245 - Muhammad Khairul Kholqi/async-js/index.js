// fungsi required untuk import dari library/module(mengimport http)
const http = require('http');
var {testFunction, newFunction} = require('./function')

// promise
const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
            setTimeout(() => {
                resolve('sudah sampai')
                // reject('saya kena tilang');
            }, 1000 * 5);
    });
}

// listerner/colback itu function
// req isinya data yang di isi dari respon
var server = http.createServer(async(req, res) => {

// url  menggunakan if els

//     req.url
//     if(req.url == '/about') {
//         res.write('ini about');
//         res.end();  
//     } else if (req.url == '/contact') {
//         res.write('ini contact');
//         res.end();
//     } else {
//         res.write('404 not found');
//         res.end()
//     }

// url  menggunakan switch

    switch (req.url) {
        case '/about':
            console.log('saya otw')
            const value = await printAgakTelat();
            console.log(value);
            console.log('ngopi');
            res.write('ini about');
            res.end();     
            break;
        case '/contact':
            res.write('ini contact');
            res.end();
            break;
        default:
            res.write('404 not found');
            res.end();
            break;
    } 
});


const port = 3000;
server.listen(port, () => {
    console.log(`server berjalan di http://localhost:${port}`);
});





