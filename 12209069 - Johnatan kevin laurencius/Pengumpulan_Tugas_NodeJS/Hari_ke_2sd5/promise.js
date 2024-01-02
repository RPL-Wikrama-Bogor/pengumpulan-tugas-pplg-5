var tugas = true;

function runningTask(nameTask, success, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if(success){
                console.log(`Tugas ${nameTask} Selesai`);
            } else {
                console.log(`Tugas ${nameTask} Belum Selesai`);
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
})
runningTask('B', false, 1000)
.then((result) => {
    console.log(result);
})
.catch((error) => {
    console.log(error);
})
runningTask('C', false, 1500)
.then((result) => {
    console.log(result);
})
.catch((error) => {
    console.log(error);
})