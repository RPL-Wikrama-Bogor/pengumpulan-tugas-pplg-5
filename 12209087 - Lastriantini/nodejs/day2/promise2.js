function runningTask(nameTask, success, time) {
    return new Promise ((resolve, reject) => {
        setTimeout(() => {
            if (success) {
                resolve(`Tugas ${nameTask} Selesai`)
            }else {
                reject(`Tugas ${nameTask} Belum Selesai`)
            }
        }, time) //3 detik
    });
}

runningTask('A', true , 3000)
.then ((result) => {
console.log(result)
})
.catch ((error) => {
console.log(error)
})

runningTask('B', false , 2000)
.then ((result) => {
console.log(result)
})
.catch ((error) => {
console.log(error)
})

runningTask('C', false , 1000)
.then ((result) => {
console.log(result)
})
.catch ((error) => {
console.log(error)
})