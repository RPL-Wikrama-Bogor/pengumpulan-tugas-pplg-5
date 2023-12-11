// memanggil package
const express = require("express");
// memanggil file buatan sendiri
const bookRouter = require("./routes/book-route");
const authorRouter = require("./routes/author-route");
const authRouter = require("./routes/auth-router");
const jwt = require("jsonwebtoken");
const cors = require("cors");
// menjalankan framework express
const accessTokenSecret = "2023-Wikrama-exp";
// memberitahu kalau project express ini ketika mengirim data, hanya bisa menggunakan format json
const app = express();
// mwngubah req dari url menjadi format json, dan membaca karakter khusus sebagai string
app.use(express.json());
app.use(
  express.urlencoded({
    extended: true,
  })
);

app.use(cors());

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

// app.use("/book", authenticateJWT, bookRouter);
app.use("/book", bookRouter);
app.use("/author", authorRouter);
app.use("/auth", authRouter);
app.get("/book/:id/:bookname/:year", (req, res) => {
  res.send(req.params);
});
app.get("/filter", (req, res) => {
  res.send(req.query);
});

// app.get('/', (req, res) => res.send('Hello world'))

app.listen(PORT, () =>
  console.log(`server berjalan di http://localhost:${PORT}`)
);
