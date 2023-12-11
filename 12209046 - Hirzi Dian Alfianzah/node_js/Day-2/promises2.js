var tugas = false;

function runningTask(nameTask, success, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (success) {
                resolve(`Tugas ${nameTask} Selesai`);
            } else {
                reject(`Tugas ${nameTask} Belum Selesai`);
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
runningTask('C', true, 500)
    .then((result) => {
        console.log(result);
    })
    .catch((error) => {
        console.log(error);
    });
runningTask('D', false, 200)
    .then((result) => {
        console.log(result);
    })
    .catch((error) => {
        console.log(error);
    });
