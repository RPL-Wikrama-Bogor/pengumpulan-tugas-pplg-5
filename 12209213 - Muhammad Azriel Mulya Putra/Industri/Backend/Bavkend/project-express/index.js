const express = require('express')
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const accesTokenSecret = '2023-WikramA-exp'
const cors = require('cors')

const app = express()
app.use(express.json())
app.use(
    express.urlencoded({
        extended: true,
    })
)
app.use(cors())
const authenticateJWT = (req, res,next) => {
    const authHeader = req.headers.authorization

if (!authHeader) {
    return res.status(403).json({message :'Unauthorized'})
    
}
const token = authHeader.split(' ')[1]
jwt.verify(token,accesTokenSecret,(err,user)=> {
    if (err) {
    return res.status(403).json({message :'Unauthorized'})
        
    }
    next()
})
}
 
const port = 2000

app.use('/auth' ,authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)                
})
app.get('/filter', (req,res)=>{
    res.send(req.query)
})



//const count = 5
// app.get('/',(req, res) => res.send('hello world'))
// app.get('/wikrama',(req, res) => res.send('hello wikrama'))
// app.get('/about',(req, res) => res.send('hello selamat datang dia about'))

//--------------------------------------------
app.listen(port, () => 
    console.log(`server ini berjalan di http://localhost:${port}`)
)
