//jalankan pada http://localhost:7000
const tugas = [
    {
        nama: "A",
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
    }
];

function soal(Task, succes) {
    return new Promise((resolve, reject) => {
        const tugasTerkait = tugas.find(tugas => tugas.nama === Task);
        if (tugasTerkait) {
            setTimeout(() => {    
                if (succes) {
                    resolve(`Tugas ${Task} Selesai dalam ${tugasTerkait.waktu} ms`);
                } else {
                    reject(`Tugas ${Task} Belum Selesai`);
                }
            }, tugasTerkait.waktu);
        } else {
            resolve(`Tugas ${Task} tidak ditemukan`);
        }
    });
}

soal('A', true)
    .then((result) => {
        console.log(result);
    })
    .catch((error) => {
        console.log(error);
    });
soal('B', false)
    .then((result) => {
        console.log(result);
    })
    .catch((error) => {
        console.log(error);
    });
soal('C', false)
    .then((result) => {
        console.log(result);
    })
    .catch((error) => {
        console.log(error);
    });
soal('D', true)
    .then((result) => {
        console.log(result);
    })
    .catch((error) => {
        console.log(error);
    });