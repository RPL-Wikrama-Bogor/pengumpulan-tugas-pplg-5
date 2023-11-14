// memanggil package
const express = require('express')
// memanggil file buatan sendiri
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const accessTokenSecret = '2023-WikramA-exp'
const cors = require('cors')
// menjalankan drameword express, app bisa diganti nama apa saja
const app = express()
// memberitahu kalau preoject express ini ketika mengirim data, hanya bisa menggunakan format json
app.use(express.json())
// mengubah req dari url menjadi tipe format json, dan membaca karakter khusus sebagai string
// urlencoded mengubah string dari url(get) agar dapat memperoses karakter dan dibaca sebagai string dan dapat mengubah string menjadi json
// kalo isi exptend nya post tidak bisa diisi (tidak berguna)
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

const PORT = 3000



// routing
app.use('/auth', authRouter)
// midleware berfungsi menjaga hak akses (authenticateJTW) yang harus menggunakan token login
app.use('/book', bookRouter)
app.use('/author', authorRouter)
// kalo path dinamis di laravel kurung kurawal {} kalo di js menggunakan :
app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})// http://localhost:3000/book/1/malinkudang/2000
app.get('/filter', (req,res) => {
    res.send(req.query)
}) //http://localhost:3000/filter?id=1&bookname=Sangkuriang

// selain get ada post, put, delete
// app.get('/', (req, res) => res.send('Hello World'))
// app.get('/wikrama', (req, res) => res.send('Wikrama'))
// app.get('/about', (req, res) => res.send('Hello ini adalah halaman about'))

// menjalankan apk di port utama
app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`)
)