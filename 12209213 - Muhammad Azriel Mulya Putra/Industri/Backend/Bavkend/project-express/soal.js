//soal
//1. buatkan fungsi dengan menggunakan promise untuk menjalankan tugas berdasarkan data
//dibawah
//lalu jalankan pada localhost:7000

// const http = require('http');

const tugas = [
    {
        nama: "a",
        hasil: true,
        waktu: 3000
    },
    {
        nama: "B",
        hasil: false,
        waktu: 1000
    },
    {
        nama: "C",
        hasil: false,
        waktu: 2000
    },
    {
        nama: "D",
        hasil: true,
        waktu: 4000
    },
];

function runTask(task) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (task.hasil) {
                resolve(`Tugas ${task.nama} selesai`);
            } else {
                reject(`Tugas ${task.nama} gagal`);
            }
        }, task.waktu);
    });
}

async function executeTasks() {
    const sortedTasks = tugas.sort((a, b) => a.waktu - b.waktu);

    for (const task of sortedTasks) {
        try {
            const result = await runTask(task);
            console.log(result);
        } catch (error) {
            console.log(error);
        }
    }
}

executeTasks();


// const server = http.createServer((req, res) => {
//     const promises = tugas.map(task => runTask(task));

//     Promise.all(promises)
//         .then(results => {
//             res.writeHead(200, { 'Content-Type': 'text/plain' });
//             res.end(results.join('\n'));
//         })
//         .catch(error => {
//             res.writeHead(500, { 'Content-Type': 'text/plain' });
//             res.end(error);
//         });
// });

// const port = 7000;
// server.listen(port, () => {
//     console.log(`Server berjalan di http://localhost:${port}`);
// });


