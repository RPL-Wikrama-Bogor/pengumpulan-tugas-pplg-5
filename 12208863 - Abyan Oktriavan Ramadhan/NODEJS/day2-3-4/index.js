// require meng import 
const http = require('http');
// CommonJS / ESM - Ecmascript

const {newFunction, testFunction} = require('./function')

// promise
const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('sudah sampai');
            // reject('saya kena tilang');
        }, 1000 * 3);
    });
    }

var server = http.createServer(async(req, res) => {
    // res.write('saya abyannn');
    // // end untuk mengirim dan menghakhiri
    // res.end();
    // switch (req.url) {
    //     case '/about':
    //         res.write('ini About');
    //         res.end()
    //         break
    //     case '/contact':
    //         res.write('ini concact');
    //         res.end()
    //         break
    //     default:
    //         res.write('404 not found');
    //         res.end()
    //         break
    // }

    if (req.url == '/about') {
        res.write('ini About');
        console.log('saya otw');
        // testFunction();
        // newFunction('aku juga mw');
        // printAgakTelat().then((value) => {console.log(value), console.log('ngopi')}).catch((error) => console.log(error))
        const value = await printAgakTelat();
        console.log(value);
        console.log('ngopi');  
        res.end()
    } else if (req.url == '/contact') {
        res.write('ini contact');
        res.end()
    } else {
        res.write('404 not found');
        res.end();
    }
});

const port = 3000;

server.listen(port, () => {
    console.log(`server runing http://localhost:${port}`);
})