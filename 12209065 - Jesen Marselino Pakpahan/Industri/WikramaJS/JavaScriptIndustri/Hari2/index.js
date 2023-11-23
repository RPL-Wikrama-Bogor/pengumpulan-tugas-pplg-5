const http = require("http");
const { testFunction, newFunction } = require('./function');
// CommonJS / ESM - EcmaScript

const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
        resolve('Sudah Sampai!');
        }, 1000 * 5);
    });

}

var server = http.createServer(async (req, res) => {

    switch (req.url){
        case "/about":
            console.log('Saya OTW');
            const value = await
            printAgakTelat()
                console.log(value); 
                console.log('Ngopi')
            res.write('Ini About')
            res.end();
            break;
        case "/":
            res.write('Ini Home');
            res.end();
            break;
        case "/contact":
            res.write('Ini Contact');
            res.end();
            break;
        default:
            res.write('404 Not Found');
                        res.end();
            break;
    }

    // if (req.url == '/about') {
    //     res.write('Ini About');
    //     res.end();
    // } else if (req.url == '/contact') {
    //     res.write('Ini Contact');
    //     res.end();
    // }else{
    //     res.write('404 Not Found')
    //     res.end();
    // }

    // res.write('Saya node.js');
    // res.end();
});

const port = 1000;
server.listen(port, () => {
    console.log(`Server berjalan pada http://localhost:${port}`);
});
