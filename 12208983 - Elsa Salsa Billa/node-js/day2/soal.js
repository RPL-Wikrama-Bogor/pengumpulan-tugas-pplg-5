//buatkan fungsi menggunakan promise
//jalankan pada http://localhost:7000
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

var nilai = true
function runningTask(nama, hasil, waktu) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            //kode diisi disini
            if (hasil) {
                resolve(`Berhasil : ${nama} Operasi berhasill!`);
            } else {
                reject(`Gagal : ${nama} Operasi gagal!`);
            }
        }, waktu)
    });
}

for (const tugasItem of tugas) {
    runningTask(tugasItem.nama, tugasItem.hasil, tugasItem.waktu)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error)
    });
}