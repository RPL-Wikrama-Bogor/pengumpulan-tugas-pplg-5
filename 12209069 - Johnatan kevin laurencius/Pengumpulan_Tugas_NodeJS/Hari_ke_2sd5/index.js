const http = require('http');
// CommonJS / ESM - Ecmascript
const {
    tesFunction,
    newFunction
} = require('./function')

const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('Sudah Sampai');
            reject('Saya kena tilang');
        }, 1000 * 5);
    });
}

var server = http.createServer(async(req, res) => {
    // if(req.url == '/about') {
    //     res.write('INI ABOUT');
    //     res.end();
    // } else {
    //     res.write('404 Not Found');
    //     res.end();
    // }
    switch (req.url) {
        case '/about':
            console.log('Saya otw');
            const value = await printAgakTelat();  
            console.log(value);
            console.log('ngopi');
            res.write('INI ABOUT');
            res.end();
            break;
        case '/portofolio' :
            res.write('INI PORTOFOLIO');
            res.end();
            break;
        default :
            res.write('404 Not Found');
            res.end();
            break;
    }
});

const port = 3535;
server.listen(port, () =>
    console.log(`Server berjalan di http://localhost:${port}`)    
    );
// console.log(`Server berjalan di http://localhost:${port}`);