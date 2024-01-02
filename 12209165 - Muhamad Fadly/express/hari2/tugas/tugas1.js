
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


runningTask('A',true,3000)
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

runningTask('C',false,2000)
    .then((result) => {
    console.log(result);

}).catch ((error) => {
    console.log(error);

});
runningTask('D',true,4000)
    .then((result) => {
    console.log(result);

}).catch ((error) => {
    console.log(error);

});

const tugas = [
    {
        nama: "A",
        hasil: true,
        waktu: 3000
    },
    {
        nama: "B",
        hasil: false,
        waktu: 1000
    },
    {
        nama: "C",
        hasil: false,
        waktu: 2000
    },
    {
        nama: "D",
        hasil: true,
        waktu: 4000
    },
]


