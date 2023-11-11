
function runningTask(nameTask, succes ,time){
    return new Promise ((resolve, reject) => {
        setTimeout(() => {
            if(succes){
                resolve(`tugas ${nameTask} sudah selesai`)
            } else {
                reject(`tugas ${nameTask} belum selesai`)
            }
        }, time)
    });
}


runningTask('A', true, 3000).then((result) => { 
    console.log(result)
}).catch((error) => {
    console.log(error)
});
runningTask('B', false, 1000).then((result) => { 
    console.log(result)
}).catch((error) => {
    console.log(error)
});
runningTask('C', false, 2000).then((result) => { 
    console.log(result)
}).catch((error) => {
    console.log(error)
});
runningTask('D', true, 4000).then((result) => { 
    console.log(result)
}).catch((error) => {
    console.log(error)
})

const port = 7000;
const http = require('http');
var server = http.createServer(async(req, res) => {

    if (req.url == '/about') {
        res.write('ini about');
        res.end()
    } else {
        res.write('ini apa');
        res.end();
    }
});


server.listen(port, () => {
    console.log(`server runing http://localhost:${port}`);
})