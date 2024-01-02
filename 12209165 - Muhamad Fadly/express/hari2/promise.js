
var tugas = false
function runningTask(nameTask,success, time){
    return new Promise((resolve, rejects) => {
        //kode di isi di sini
        setTimeout(() => {
            if (success) {
                resolve(`tugas ${nameTask} selesai`)
                }else{
                rejects(`tugas ${nameTask} belum selesai`)
                }
        },time)
    
    })
}


runningTask('A',true,2000)
    .then((result) => {
    console.log(result);

}).catch ((error) => {
    console.log(error);

});

runningTask('B',false,1000)
    .then((result) => {
    console.log(result);

}).catch ((error) => {
    console.log(error);

});

runningTask('C',true,500)
    .then((result) => {
    console.log(result);

}).catch ((error) => {
    console.log(error);

});






