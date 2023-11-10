var tugas = true;

function runningTasks(nameTask, suscess, time) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (suscess) {
        resolve(`Tugas ${nameTask} Selesai`)
      } else {
        reject(`Tugas ${nameTask} Belum Selesai`)
      }
    }, time)
  })
}

runningTasks('A', true, 2000)
  .then((result) => {
    console.log(result)
  })
  .catch((error) => {
    console.log(error)
  });
runningTasks('B', false, 1000)
  .then((result) => {
    console.log(result)
  })
  .catch((error) => {
    console.log(error)
  });
runningTasks('C', false, 500)
  .then((result) => {
    console.log(result)
  })
  .catch((error) => {
    console.log(error)
  });