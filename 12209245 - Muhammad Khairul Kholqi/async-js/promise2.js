var tugas = true

function runningTask(nameTask, success, time) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (success) {
                resolve(`tugas ${nameTask} selesai`)
            } else {
                reject(`tugas ${nameTask}  selesai`)
            }
        }, time);
    })
}

runningTask('A', true, 2000) 
.then((result) => {
    console.log(result)
})
.catch((error) => {
    console.log(error)
})

runningTask('B', false, 1000)
.then((result) => {
    console.log(result)
})
.catch((error) => {
    console.log(error)
})