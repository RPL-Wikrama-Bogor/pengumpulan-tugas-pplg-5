//memanggil package
//jika menggunakan./ maka mencari file diluar folder node module

const express = require("express");
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-wikramA-exp'

//menjalankan framwork express
const app = express()
//memberitahu kalau projek express ini ketika mengirim data hanya bisa menggunakan format json


app.use(express.json())
//mengubah req dari url menjadi tipe format json dan membaca karekter khusus menjadi string

app.use(
    express.urlencoded({
        extended: true,
    })
)
//mengubah semua menjadi string


app.use(cors())

const authenticateJWT = (req, res, next) =>{
    const authHeader = req.headers.authorization

    if(!authHeader){
         return res.status(403).json({massage:'No token provided'})
     }


     const token = authHeader.split(' ')[1]

     jwt.verify(token, accessTokenSecret, (err, user)=>{
        if(err){
            return res.status(403).json({massage:'No token provided'})
        }
        next()
     })





     





     


}
const PORT = 3000

app.use('/book',  bookRouter)
app.use('/author', authorRouter)
app.use('/auth', authRouter)
app.get('/book/:id/:bookname/:bookyear', (req, res) => {
    res.send(req.params)
})
app.get('/filter', (req, res)=>{
    res.send(req.query)
})

//menjalankan aplikasi di port
app.listen(PORT, () => 
  console.log(`SERSVER INI http://localhost:${PORT}`)
)
