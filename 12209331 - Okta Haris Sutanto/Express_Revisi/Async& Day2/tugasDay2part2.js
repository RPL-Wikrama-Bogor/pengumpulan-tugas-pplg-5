const tugas = [
  {
    name: "A",
    hasil: true,
    waktu: 3000,
  },
  {
    name: "B",
    hasil: false,
    waktu: 1000,
  },
  {
    name: "C",
    hasil: false,
    waktu: 2000,
  },
  {
    name: "D",
    hasil: true,
    waktu: 4000,
  },
];

function runningTask(task) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (task.hasil) {
        resolve(`Tugas ${task.name} Selesai`);
      } else {
        reject(`Tugas ${task.name} Belum Selesai`);
      }
    }, task.waktu);
  });
}

async function AllTugas() {
  for (const AllTugasK of tugas) {
    try {
      const hasil = await runningTask(AllTugasK);
      console.log(hasil);
    } catch (error) {
      console.log(error);
    }
  }
}

AllTugas();