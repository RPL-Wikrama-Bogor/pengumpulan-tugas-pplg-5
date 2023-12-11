const http = require("http");
const { testFunction, newFunction } = require("./function");

const printAgakTelat = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Sudah sampai");
    }, 1000 * 5);
  });
};

var server = http.createServer(async (req, res) => {
  switch (req.url) {
    case "/about":
      console.log("Saya OTW");
      const value = await printAgakTelat();
      console.log(value);
      console.log("ngopi");
      res.write("ini about");
      res.end();
      break;

    case "/contact":
      testFunction();
      res.write("ini contact");
      res.end();
      break;

    default:
      res.write("404 Not Found");
      res.end();
      break;
  }

  //   if (req.url == "/about") {
  //     res.write("ini about");
  //     res.end();
  //   } else {
  //     res.write("404 Not Found");
  //     res.end();
  //   }
});

const port = 1316;
server.listen(port, () => {
  console.log(`Server Berjalan di http://127.0.0.1:${port}`);
});
