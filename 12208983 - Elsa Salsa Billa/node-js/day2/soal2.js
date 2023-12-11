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
  
  function runningTask(nama, hasil, waktu) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        if (hasil) {
          resolve(`Berhasil : ${nama} Operasi berhasill!`);
        } else {
          reject(`Gagal : ${nama} Operasi gagal!`);
        }
      }, waktu);
    });
  }
  async function runningTasks() {
    for (const tugasItem of tugas) {
      try {
        const result = await runningTask(
          tugasItem.nama,
          tugasItem.hasil,
          tugasItem.waktu
        );
        console.log(result);
      } catch (error) {
        console.log(error);
      }
    }
  }
  
  runningTasks();