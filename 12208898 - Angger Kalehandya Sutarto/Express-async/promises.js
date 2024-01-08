var tugas = false;

function runningTask(nameTask, success, time) {
  return myPromise = new Promise((resolve, reject) => {
    // kode di isi disini
    setTimeout(() => {
      if (success) {
        resolve(`Tugas ${nameTask} Selesai dengan waktu ${time} detik`);
      } else {
        reject(`Tugas ${nameTask} Belum Selesai`);
      }
    }, 1000);
  });
}

runningTask('A', true, 2000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });

runningTask('B', true, 1000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });
