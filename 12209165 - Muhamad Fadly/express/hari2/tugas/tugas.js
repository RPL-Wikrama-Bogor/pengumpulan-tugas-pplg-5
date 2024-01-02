const http = require('http')
const port = 7000;

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

function runTugas(name,success, time){
    return new Promise((resolve, reject) => {
        //kode di isi di sini
        setTimeout(() => {
            if (success) {
                resolve(`tugas ${name} selesai`)
                }else{
                reject(`tugas ${name} belum selesai`)
                }
        },time);
    
    })
}
var server = http.createServer(async(req, res)=>{
    for(const item of tugas ){
        try {
            let result = await runTugas(item.nama, item.hasil, item.waktu);
            res.write(`<p>${result}</p>`)
            
            } catch (error) {
                res.write(`<p>${error}</p>`)
                }
            }
            res.end();
        })


server.listen(port,()=>{console.log(`server berjalan di http://localhost:${port}`);});