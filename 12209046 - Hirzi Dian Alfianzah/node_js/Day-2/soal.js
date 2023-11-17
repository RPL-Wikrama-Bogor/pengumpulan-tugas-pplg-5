//Soal
// buatkan fungsi dengan menggunakan promise unutk menjalankan tugas bersdasarkan data di bawah ini lalu jalankan pada httpt://localhost:7000
const tugas = [
  { nama: "A", hasil: true, waktu: 3000 },
  { nama: "B", hasil: true, waktu: 1000 },
  { nama: "C", hasil: true, waktu: 2000 },
  { nama: "D", hasil: true, waktu: 4000 },
];

function jalankanTugas(tugas) {
  return new Promise((resolve, reject) => {
    let index = 0;

    function eksekusiTugas() {
      if (index < tugas.length) {
        const tugasSekarang = tugas[index];
        console.log(`Mengerjakan tugas ${tugasSekarang.nama}`);
        setTimeout(() => {
          console.log(`Tugas ${tugasSekarang.nama} selesai`);
          index++;
          eksekusiTugas();
        }, tugasSekarang.waktu);
      } else {
        resolve("Semua tugas selesai");
      }
    }

    eksekusiTugas();
  });
}

// Aktifkan Port
const http = require("http");
const server = http.createServer((req, res) => {
  if (req.url === "/") {
    jalankanTugas(tugas)
      .then((hasil) => {
        console.log(hasil);
        res.write(`Tugas selesai: ${hasil}`);
        res.end();
      })
      .catch((error) => {
        console.error(error);
        res.write(`Terjadi kesalahan: ${error}`);
        res.end();
      });
  } else {
    res.writeHead(404, { "Content-Type": "text/plain" });
    res.end("404 Not Found");
  }
});

const port = 7000;
server.listen(port, () => {
  console.log(`Server Berjalan di http://localhost:${port}`);
});
