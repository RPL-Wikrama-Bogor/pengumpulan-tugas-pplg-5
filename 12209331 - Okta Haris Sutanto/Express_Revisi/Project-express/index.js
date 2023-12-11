const express = require('express') 
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const accessTokenSecret = '2023-WikramA-exp'
const cors = require('cors')

const app = express()
// ketika mengirim data(postman) harus type JSON
app.use(express.json())

// mengubah req url  menjadi tipe format JSON http://localhost:4000/auth/login

app.use(express.urlencoded({
    extended: true,
}))

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization
    if(!authHeader) {
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err) {
            return res.status(403).json({message: 'Unauthorized'})
        }
        next()
    })
}

const PORT = 3000
// routing 
app.use('/author', authorRouter)
app.use('/book', authenticateJWT, bookRouter)    
app.use('/auth', authRouter)
app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params.asal)
})

app.get('/filter', (req, res) => {
    res.send(req.query)
})


// app.get('/', (req, res) => res.send('Hello World'))

// app.get('/wikrama', (req, res) => res.send('Hello Wikrama!'))

// app.get('/about', (req, res) => res.send('Hello Ini adalah halaman About!'))

app.listen(PORT, () => console.log(`Server ini berjalan di http://localhost:${PORT}`))