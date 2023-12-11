//memangil pakege
const express = require('express')
//memangil file buatan sendiri
const bookRouter = require('./routes/book_route')
const authorRouter = require('./routes/author_route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const cors = require('cors')

const accessTokensecret = '2023-wikrama-exp'


//menjalan kan fremwork express
const app = express();
//memberitahu bahwa project express ini ketika mengirim data,hanya bisa mengunakan format json
app.use(express.json())
//mengubah req dari url menjadi format json, dan membaca karakter khusus sebagai string
app.use(

    express.urlencoded({
        extended: true,
    })
)
app.use(cors())

const authenticateJwt = (req, res, next)=>{
    const authHeader = req.headers.authorization
    if(!authHeader){
        return res.status(403).json({message:'Unauthorization'})
    }
    const token = authHeader.split(" ")[1]
    jwt.verify(token, accessTokensecret, (err, user)=>{
        if (err) {
            return res.status(403).json({message:'unauthorized'})
        }
        next()
    })
}

const PORT = 3000
//routing
//authenticateJwt, pake di book sama di author buat login memalui token
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.use('/auth', authRouter)


app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})
app.get('/filter',(req, res) =>{
    res.send(req.query)
})



// app.get('/',(req, res) => res.send('Hello sugiono!'))
// app.get('/wikrama',(req, res) => res.send('Hello sugiono!'))
// app.get('/about',(req, res) => res.send('Hello sugiono!'))

app.listen(PORT, () => console.log(`server berjalan di http://localhost:${PORT}`))