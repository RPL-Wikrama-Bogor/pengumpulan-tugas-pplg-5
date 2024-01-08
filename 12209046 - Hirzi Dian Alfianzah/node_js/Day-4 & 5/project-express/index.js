//memanggl package
const express = require("express");
//memanggil file buatan sendiri
const bookRouter = require("./routes/book-route");
const authorRouter = require("./routes/author-route");
const authRouter = require("./routes/auth-route");
const jwt = require('jsonwebtoken')
const accessTokenSecret = "2023-wikrama-exp";
//menjalankan framework express
const cors = require('cors')
//memberitahu kalau project express ini ketika mengirim data. hanya bisa menggunakan format json
const app = express();
//mengubah req dari url menjadi tipe format json, dan membaca karakter khisis sebagai string
app.use(express.json());
app.use(
  express.urlencoded({
    extended: true,
  })
);

app.use(cors())

const authenticateJWT = (req, res, next) => {
  const authHeader = req.headers.authorization

  if(!authHeader) {
    return res.status(403).json({massage: 'Unauthorized'})
  }

  const token = authHeader.split(' ')[1];

  jwt.verify(token, accessTokenSecret, (err, user) => {
    if(err){
      return res.status(403).json({message: 'Unauthorized'})
    }
    next()
  })
}
const PORT = 3000;
//Routing
app.use("/auth", authRouter);
app.use("/book", bookRouter);
app.use("/author", authorRouter);
app.get("/book/:id/:bookname/:year", (req, res) => {
  res.send(req.params);
});

app.get("/filter", (req, res) => {
  res.send(req.query);
});

app.listen(PORT, () =>
  console.log(`Server ini berjalan di http://localhost:${PORT}`)
);
