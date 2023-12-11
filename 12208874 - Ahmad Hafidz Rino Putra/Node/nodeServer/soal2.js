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
  
  function kerjakanTugas(tugas) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        if (tugas.hasil) {
          resolve(`Selesai : Tugas ${tugas.nama} telah selesai `);
        } else {
          reject(`Gagal : Tugas ${tugas.nama} belum selesai`);
        }
      }, tugas.waktu);
    });
  }
  
  async function kerjakanSemuaTugas() {
    for (const tugasIndividu of tugas) {
      try {
        const hasil = await kerjakanTugas(tugasIndividu);
        console.log(hasil);
      } catch (error) {
        console.log(error);
      }
    }
  }
  
  kerjakanSemuaTugas();
  