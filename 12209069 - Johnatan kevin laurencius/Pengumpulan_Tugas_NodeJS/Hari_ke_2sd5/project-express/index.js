// memanggil package
const express = require('express');
// memanggil file buatan sendiri
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-WikramA-Exp'

// menjalankan framework express
const app = express()
// memberitahu kalau project express ini ketika mengirim data. hanya bisa menggunakan format json
app.use(express.json())
// mengubah request dari URL menjadi tipe format json, dan membaca karakter khusus sebagai string
app.use(
    express.urlencoded({
        extended: true,
    })
)

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

const PORT = 1200;

app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.use('/auth', authRouter)
  
app.get('/book/:id/:bookname/:creator', (req, res) => {
    res.send(req.params)
})

app.get('/filter', (req, res) => {
    res.send(req.query)
})

// menjalankan aplikasi di port khusus
app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`)
    );