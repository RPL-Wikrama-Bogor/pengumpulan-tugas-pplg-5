const express = require('express')
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const accessTokenSecret = '2023-WikramA-exp'
const cors = require('cors')

//menjalankan framework express
const app = express()

//membritahu kalau project express ini ketika mengirim data, hanya bisa menggunakan format json
app.use(express.json())

//mengubah req dari url menjadi tipe format json dan membaca karakter khusus sebagai string
app.use(
    express.urlencoded({
        extended:true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if(!authHeader) {
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err){
            return res.status(403).json({message: 'Unauthorized'})
        }
        next()
    })
}

//authenticateJWT sebagai middle wear : menjaga hak akses user
//routing parameter
app.use('/auth', authRouter)
app.use('/book', authenticateJWT, bookRouter)
app.use('/author', authorRouter)
app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})
app.get('/filter', (req,res) => {
    res.send(req.query)
})

const PORT = 3000 
//menjalankan apk di port utama
app.listen(PORT,() => 
    console.log(`server ini berjalan di http://localhost:${PORT}`)
)

// http://localhost:3000/filter?id=5&bookname=malinghati&year=2007

// //routing menggunakan get
// app.get('/', (req, res) => req.end('Hello World'))
// app.get('/wikrama', (req, res) => req.end('Hello Wikrama'))
// app.get('/about', (req, res) => res.send('ini hal about'))