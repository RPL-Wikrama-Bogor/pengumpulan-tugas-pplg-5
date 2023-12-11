const express = require('express') // require berfungsi untuk memanggil folder
const bookRouter = require('./routes/book-route') // memanggil folder atau file (./) untuk di luar node modules
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken') // memanggil pakage di dalam node modules
const cors = require('cors')
const accessTokenSecret = '2023-WikramA-exp'

// json = javascript object notasion
const app = express() // menjalankan framework express
app.use(express.json()) // memberitahu kalau project ini ketika mengirim data, hanya bisa menggunakan format json
app.use(
    express.urlencoded({
        extended: true,
    })
) // mengubah request dari url menjadi tipe format json, dan membaca karakter khusus sebagai string

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

app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})// http://localhost:3000/book/1/malinkudang/2000

app.get('/filter', (req,res) => {
    res.send(req.query)
}) //http://localhost:3000/filter?id=1&bookname=Sangkuriang


//routing
app.use('/auth', authRouter)
app.use('/book', bookRouter) // midle wear menjaga hak akses dari user
app.use('/author', authorRouter)




// selain get ada post, put, delete
// app.get('/', (req, res) => res.send('Hello World'))
// app.get('/wikrama', (req, res) => res.send('Wikrama'))
// app.get('/about', (req, res) => res.send('Hello ini adalah halaman about'))


//menjalankan aplikasi di port yang bebeda
app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`)
)