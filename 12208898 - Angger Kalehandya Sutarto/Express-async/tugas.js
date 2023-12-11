// Soal 1
const http = require("http");

const tugas = [
  { nama: "A", hasil: true, waktu: 3000 },
  { nama: "B", hasil: false, waktu: 1000 },
  { nama: "C", hasil: false, waktu: 2000 },
  { nama: "D", hasil: true, waktu: 4000 },
];

function runningTask(name, succes, time) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (succes) {
        resolve(`Tugas ${name} Selesai`);
      } else {
        reject(`Tugas ${name} Belum Selesai`);
      }
    }, time);
  });
}

var Server = http.createServer(async (req, res) => {
    
});

runningTask("A", true, 3000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });
runningTask("B", false, 1000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });
runningTask("C", false, 2000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });
runningTask("D", true, 4000)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });

const port = 7000;
Server.listen(port, () => {
  console.log(`Server Berjalan Di http://localhost:${port}`);
});
