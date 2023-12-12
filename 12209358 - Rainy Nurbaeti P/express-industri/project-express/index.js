//memanggil package
const express = require('express')
//memanggil file buatanya sendiri
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken')
const { user } = require('./config/db-config')
const cors = require('cors')

const accessTokenSecret = '2023-wikramA-exp'

//menjalankan  fremwork express
const app = express()
//memberi tahu kalo project express ini ketika mengirim data hanya menggunakan format json
app.use(express.json())

//mengubah req url menjadi tipe json dan membaca karakter khusus sebagai sring
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader =req.headres.authorization

    if (!authHeader) {
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err){
            return res.status(403).json({ message: 'Unauthorized'})
        }

        next()
    })
}

const PORT = 3000 

app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)

app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
}) 
app.get('/filter',(req,res) => {
    res.send(req.query)
})


// app.get('/', (req, res) => res.send('hello word'))

// app.get('/wikrama', (req, res) => res.send('hello wikrama'))

// app.get('/about', (req, res) => res.send('ini adalah halaman about'))

// app.get('/book', (req, res) => {
//     res.send('GET book code')
    
// })
// app.post('/book', (req, res) => {
//     res.send('POST book code')

// })
// app.put('/book', (req, res) => {
//     res.send('PUT book code')

// })
// app.delete('/book', (req, res) => {
//     res.send('DELETE book code')

// })


// app.get('/author', (req, res) => {
//     res.send('GET author code')
    
// })
// app.post('/author', (req, res) => {
//     res.send('POST author code')

// })
// app.put('/author', (req, res) => {
//     res.send('PUT author code')

// })
// app.delete('/author', (req, res) => {
//     res.send('DELETE author code')

// })




app.listen(PORT,() => 
    console.log(`server ini berjalan di http://localhost:${PORT}`)
)

