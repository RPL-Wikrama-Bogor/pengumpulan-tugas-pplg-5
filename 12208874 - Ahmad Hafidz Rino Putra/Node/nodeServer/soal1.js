const tugas = [
  {
    nama: "A",
    hasil: true,
    waktu: 3000,
  },
  {
    nama: "B",
    hasil: false,
    waktu: 1000,
  },
  {
    nama: "C",
    hasil: false,
    waktu: 2000,
  },
  {
    nama: "D",
    hasil: true,
    waktu: 4000,
  },
];

function selesaikanTugas(nama, hasil, waktu) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (hasil) {
        resolve(`Selesai : Tugas ${nama} telah selesai`);
      } else {
        reject(`Gagal : Tugas ${nama} belum selesai`);
      }
    }, waktu);
  });
}

for (const tugasBaru of tugas) {
  selesaikanTugas(tugasBaru.nama, tugasBaru.hasil, tugasBaru.waktu)
    .then((result) => {
      console.log(result);
    })
    .catch((error) => {
      console.log(error);
    });
}
