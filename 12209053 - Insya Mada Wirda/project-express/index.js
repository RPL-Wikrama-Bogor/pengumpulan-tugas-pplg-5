const express = require('express')
//memanggil package
const bookRouter = require('./routes/book-route')
//memanggil file buatan sendiri
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokensecret = '2023-wikrama-exp'
//menjalankan framweork express

const app = express()
//json= javascript object notions format penulisan data
//memberi tahu kalau project express ini ketika mengirim data. hanya bisa menggunakan format json
app.use(express.json())
//mengubah req dari url menjadi tipe format json, dan membaca karakter khusus sebagai string
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())


const authenticateJWT = (req,res,next) => {
    const authHeader = req.headers.authorization

    if(!authHeader){
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token,accessTokensecret, (err,user) => {
        if(err){
            return res.status(403).json({message: 'Unauthorized'})
        }
        next()
    })
}
//path biasa=
//path dinamis=
//routing
const PORT = 3001

app.use('/auth',authRouter)
app.use('/book',bookRouter)
app.use('/author',authorRouter)
app.get('/book/:id/:bookname/:year',(req,res) => {
    res.send(req.params)
})




//route
// app.get('/',(req,res) => res.send('Hello World'))
// app.get('/wikrama',(req,res) => res.send('Hello Wikrama'))
// app.get('/about',(req,res) => res.send('Hello ini adalah halaman about'))


// menjalankan aplikasi di port khusus
app.listen(PORT,()=>
console.log(`server ini berjalan di http://localhost:${PORT}`)
)