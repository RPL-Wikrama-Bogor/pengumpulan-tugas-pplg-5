var tugas = true

function runningTask(nameTask, succes ,time){
    return new Promise ((resolve, reject) => {
        setTimeout(() => {
            if(succes){
                resolve(`tugas ${nameTask} sudah selesai`)
            } else {
                reject(`tugas ${nameTask} belum selesai`)
            }
        }, time)
        //code di isi disini
        // klo berhasil panggil resolve 
        // jika gagal panggil reject
    });
}


runningTask('A', true, 2000).then((result) => { 
    //tindakan yang berhasil ada di result
    console.log(result)
}).catch((error) => {
    // tindakan yang error akan di ambil dari error
    console.log(error)
});
runningTask('B', false, 1000).then((result) => { 
    //tindakan yang berhasil ada di result
    console.log(result)
}).catch((error) => {
    // tindakan yang error akan di ambil dari error
    console.log(error)
})
runningTask('C', false, 500).then((result) => { 
    //tindakan yang berhasil ada di result
    console.log(result)
}).catch((error) => {
    // tindakan yang error akan di ambil dari error
    console.log(error)
})