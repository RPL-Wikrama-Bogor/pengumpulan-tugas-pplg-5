const express = require('express')
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken') //memanggil sebuah package yg ada didalam folder node moduls
const cors = require('cors')

//menjalankan framework express, nama var nya bebas
const app = express()
// memberitahu kalau project express ini ketika mengirim data hanya bisa menggunakan format json
app.use(express.json())
//mengubah request dari url menjadi tipe format json dan membaca karakter khusus sbagai string
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if (!authHeader) {
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err,user) => {
        if(err){
            return res.status(403).json({ message: 'Unauthorized'})
        }
        next()
    })
}

// port dimulai dari 1-9999
const PORT = 3000

// routing
// /book itu buat nyambung ke url nya - bookRouter nama functionnya
// tengah2 -> midleware perlu token login untuk mengakses
// path biasa tidak berubah klo path yg ada : bisa diubah
app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.get('/book/:bookname/:year', (req, res) => {
    res.send(req.params)
})
app.get('/filter', (req, res) => {
    res.send(req.query)
})

// menjalankan aplikasi di port khsusus yg sudah kita definisikan
app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`)
)