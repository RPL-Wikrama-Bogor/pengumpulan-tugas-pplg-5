// memanggil package
const express = require('express')
// memanggil file buatan sendiri
const bookRouter= require('./routes/book-route')
const authorRouter= require('./routes/author-route')
const authRouter= require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-WikramA-exp'
// menjalankan framework express
const app = express()
// memberitahu kalau format
app.use(express.json())
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT= (req, res, next) => {
    const authHeader = req.headers.authorization
    
    if(!authHeader){
        return res.status(403).json({massage: 'Unauthorized'})
    }
    
    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err){
            return res.status(403).json({massage: 'Unauthorized'})
        }

        next()
    })
}

const PORT = 3000


app.use('/auth', authRouter)
app.use('/book',  bookRouter)
app.use('/author', authorRouter)
app.get('/book/:id/:namabuku/:year', (req, res) => {
    res.send(req.params)
})
app.get('/filter', (req, res) =>{
    res.send(req.query)
})



app.listen(PORT, () => console.log(`server running http://localhost:${PORT}`))

app.get('/', (req, res) => res.send(`hello world`))

// app.get('/Wikrama', (req, res) => res    .send('SMK Wikrama Bogor'))

// app.get('/About', (req, res) => res.send('its about'))