const http = require("http");
const { testFunction, newFunction } = require("./function.js");

//Promise
const printAgakTelat = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Sudah Sampai");
    }, 1000 * 5);
  });
};

// write untuk output yang di diingin kan
var server = http.createServer(async (req, res) => {
  //Router Switch Case
  switch (req.url) {
    case "/about":
      console.log("Saya Otw");
      const value = await printAgakTelat();
      // printAgakTelat().then((value) =>{ console.log(value); console.log('Ngopi');}).catch((error) => console.log(error));
      console.log(value);
      console.log('Ngopi');
      res.write("Ini About");
      res.end();
      break;
    default:
      res.write("404 Not Found");
      res.end();
      break;
  }

  //Router IF dan ELSE
  //   if (req.url == '/about') {
  //     res.write("Ini About");
  //     res.end();
  //   } else if (req.url == '/contact') {
  //   } else {
  //     res.write('404 Not Found');
  //     res.end();
  //   }
});

//listen
const port = 3000;
server.listen(port, () => {
  console.log(`Server Berjalan di http://localhost:${port}`);
});
