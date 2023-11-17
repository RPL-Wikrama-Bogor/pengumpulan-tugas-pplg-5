const http = require("http");
const { testFunction, newFunction } = require("./function");
// CommonJS / ESM testFunction

// Promise -> mewakili suatu nilai
const printAgakTelat = () => {
  // resolve berhasil / reject gagal
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Sudah Sampai");
      // reject("Saya kena tilang");
    }, 1000 * 5);
  });
};

var server = http.createServer(async(req, res) => {
  // res.write('hello world');
  // res.end();

  switch (req.url) {
    case "/about":
      console.log("saya otwi");
      const value = await printAgakTelat();
      // printAgakTelat()
      //   .then((Value) => {
      //     console.log(Value);
      //     console.log('Paket');
      //   })
      //   .catch((error) => console.log(error));
      // testFunction();
      // newFunction('ini berasal dari parameter');
      console.log(value);
      console.log('Paket');
      res.write("ini about");
      res.end();
      break;
    case "/contact":
      testFunction();
      newFunction();
      res.write("ini contact");
      res.end();
      break;
    default:
      res.write("404 not found");
      res.end();
      break;
  }

  // if (req.url == '/about') {
  //   res.write('ini about');
  //   res.end();
  // }

  // else {
  //   res.write('404 Not Found');
  //   res.end();
  // }
});

