const tugas = [
    {
        nama: "A", hasil: true, waktu: 3000
    },
    {
        nama: "B", hasil: false, waktu: 1000
    },
    {
        nama: "C", hasil: false, waktu: 2000
    },
    {
        nama: "D", hasil: true, waktu: 4000
    },
]
function runningTask(nameTask, success, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if(success){
                console.log(`Tugas ${nameTask} Selesai`);
            } else {
                console.log(`Tugas ${nameTask} Belum Selesai`);
            }
        }, time);
    });
}

    tugas.forEach((tugas) => {
        runningTask(tugas.nama, tugas.hasil, tugas.waktu)
        .then((result) => {
            console.log(result);

        })
        .catch((error) => {
            console.log(error);
        })
    })

const http = require('http');

var server = http.createServer((req, res) => {
    
});

const port = 7000;
server.listen(port, () =>
    console.log(`Server berjalan di http://localhost:${port}`)    
    );