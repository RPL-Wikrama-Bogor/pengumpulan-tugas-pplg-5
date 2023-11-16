const http = require("http"); // Import dengan CommonJS / ESM - Ecmascript
const { test, test2 } = require("./function");

//promise
const printLambat = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("sudah sampai");
      //   reject("saya kena tilang");
    }, 1000 * 5);
  });
};

var server = http.createServer(async (req, res) => {
  switch (req.url) {
    case "/about":
      //   test();
      //   test2("ini dari parameter");
      console.log("otw bang");
      const value = await printLambat();
      console.log(value);
      console.log("ngopi");
      res.write("Ini about");
      res.end();
      break;

    case "/contact":
      res.write("Ini contact");
      res.end();
      break;
    default:
      res.write("404 NOT FOUND");
      res.end();
  }
  //     if (req.url =='/about') {
  //     res.write('Ini about') ;
  //     res.end();
  //   }else if (req.url == '/contact'){
  //     res.write('Ini contact') ;
  //     res.end();
  //   }
  //   else {
  //     res.write('404 NOT FOUND') ;
  //     res.end();
  //   }
});

const port = 9000;
server.listen(port);
console.log(`http://localhost:${port}`);
