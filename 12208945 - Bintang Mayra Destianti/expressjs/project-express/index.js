//require manggil di node_moduls
const express = require('express')
//memnggil file buatan sendiri yg ./
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken')
const cors = require('cors')

const accessTokenSecret = '2023-WikramA-exp'


//menjalankan framework express
const app = express()

//memberitahu kalau project express ini ketika mengirim data hanya bisa menggunakan format json
app.use(express.json())

//mengubah req dari url menjadi tipe format json dan membaca karakter khusus sbagai string
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

app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})// http://localhost:3000/book/1/malinkudang/2000

app.get('/filter', (req,res) => {
    res.send(req.query)
}) //http://localhost:3000/filter?id=1&bookname=Sangkuriang


app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)




// selain get ada post, put, delete
// app.get('/', (req, res) => res.send('Hello World'))
// app.get('/wikrama', (req, res) => res.send('Wikrama'))
// app.get('/about', (req, res) => res.send('Hello ini adalah halaman about'))


app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`)
)