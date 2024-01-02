function runningTask(nameTask, success, time) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (success) {
        resolve(`Tugas ${nameTask} selesai`);
      } else {
        reject(`Tugasnya ${nameTask} belum selesai`);
      }
    }, time);
  });
}
runningTask('A', true, 2000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });

runningTask('B', false, 1000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });
