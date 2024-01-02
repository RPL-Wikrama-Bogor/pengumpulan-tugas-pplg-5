const tugas = [
  {
    name: "A", hasil: true, waktu: 3000
  },
  {
    name: "B", hasil: false, waktu: 1000
  },
  {
    name: "C", hasil: false, waktu: 2000
  },
  {
    name: "D", hasil: true, waktu: 4000
  }
];

function runningTask(nameTask, suscess, time) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (suscess) {
        resolve(`Tugas ${nameTask} Selesai`)
      } else {
        reject(`Tugas ${nameTask} Belum Selesai`)
      }
    }, time)
  });
}

tugas.forEach((tugas) => {
  runningTask(tugas.name, tugas.hasil, tugas.waktu)
    .then((result) => {
      console.log(result);
    })
    .catch((error) => {
      console.log(error);
    });
});





