const http = require('http');
 //import : commonjs/ESM-Ecmascript
 const { testFunction, newFunction } = require('./function.js');
const { error } = require('console');
 //promise
 const printAgakTelat = () =>{
    return new Promise((resolve,reject) => {
        setTimeout(() => {
            resolve('sudah sampai');
            // reject('saya kena tilang')
            
        },1000 * 5);

    });
   
 }

var server = http.createServer(async(req, res)=>{
    // if (req.url == '/about') {
    //     res.req
    //     res.write('ini about');
    //     res.end();
    // }else if(req.url == '/contact'){
    //     res.write('ini contact');
    //     res.end();
    // }
    
    // else{
    //     res.write('404 dot found');
    //     res.end();
    // }
    
    switch (req.url) {
        case '/about':
            console.log('saya Otw');
            const value = await  printAgakTelat();
            console.log(value)
            console.log('ngopi');
            res.write('ini about');
            res.end();
            break;
    
        default:
            res.write('404 dot found');
            res.end();
            break;
    }
});
const port = 3000;
server.listen(port,()=>{console.log(`server berjalan di http://localhost:${port}`);});
