//memanggil package
const express = require("express");
//memanggil file buatan sendiri
const bookRouter = require("./routes/book-route");
const authorRouter = require("./routes/author-route");
const authRouter = require("./routes/auth-route");
const jwt = require("jsonwebtoken");
const cors = require('cors')
const accessTokenSecret = "2023-Wikrama-exp";

//menjalakankan fw express
const app = express();

//memberitahu kalau project express ini ketika mengirim data hanya bisa menggunakan format json
app.use(express.json());

//merubah req dari url menjadi tipe data json & membaca karakter khusus sbg string
app.use(
  express.urlencoded({
    extended: true,
  })
);

app.use(cors())

const authenticateJWT = (req, res, next) => {
  const authHeader = req.headers.authorization;

  if (!authHeader) {
    return res.status(403).json({ message: "Unauthorized" });
  }

  const token = authHeader.split(" ")[1];

  jwt.verify(token, accessTokenSecret, (err, user) => {
    if (err) {
      return res.status(403).json({ message: "Unauthorized" });
    }
    next();
  });
};
const PORT = 3000;

//isi kedua di dalam kurung memanggil func
app.use("/book" ,bookRouter);
app.use("/author" , authorRouter);
app.use("/auth" , authRouter);

app.get("/book/:id/:bookname/:year", (req, res) => {
  res.send(req.params);
});
app.get("/filter", (req, res) => {
  res.send(req.query);
});

// app.get('/', (req, res) => res.send('Hello World'))
// app.get('/wikrama', (req, res) => res.send('Hello Wikrama'))
// app.get('/about', (req, res) => res.send('Ini About'))

app.listen(PORT, () => console.log(`http://localhost:${PORT}`));
