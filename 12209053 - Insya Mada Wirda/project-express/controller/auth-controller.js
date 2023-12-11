const dbConfig = require('../config/db_config')
const mysql = require('mysql2')
const jwt = require('jsonwebtoken')
const pool = mysql.createPool(dbConfig)

pool.on('error',(err) => {
    console.log(err)
})

const accessTokensecret = '2023-wikrama-exp'

const responseFailValidate = (res,message) => res.status(400).json({
    success: false,
    message: message
})

const responseAuthSuccess =(res,token,message,user) => res.status(200).json({
    success: true,
    token: token,
    message: message,
    user: user
})

const register = (req,res) => {
    if (req.body.email == null 
        || req.body.username == null
        || req.body.password == null){
            responseFailValidate(res,'Email/Username/Password Wajib Diisi')
        }
        const data = {
            email: req.body.email,
            username: req.body.username,
            password: req.body.password
        }
    const query = 'INSERT INTO users SET ?;'
   
    pool.getConnection((err,Connection) => {
        if(err) throw err

        Connection.query(query,[data],(err,results) => {
        if(err) throw err

        if(results.affectedRows >=1){
            const token = jwt.sign(
                {email: data.email, username: data.username},
                accessTokensecret
            )
            responseAuthSuccess(res,token,'Register Successful',{
                email : data.email,
             username: data.username
            })
        } else {
            res.status(500).json('Failed creating user')
        }

        })

        Connection.release()
    })
}

const login = (req,res) =>{
    if(req.body.email == null || req.body.password == null){
        responseFailValidate(res,'Email/Password Wajib Diisi')
    }

const {email,password} = req.body

const query =`SELECT * FROM users WHERE email = '${email}' AND password = '${password}'`

pool.getConnection((err,Connection) => {
    if(err) throw err
  
    Connection.query(query,(err,results) => {
    if(err) throw err
    
    if(results.length >= 1){
        const user = results.pop(0)

        const token = jwt.sign(
            {email: user.email, username: user.username},
            accessTokensecret
        )

        responseAuthSuccess(res,token, 'Login Succes', {
            email: user.email, 
            username: user.username
        })
    } else {
        res.status(404).json({message: 'Email or Password is Wrong'})
    }
    })
    Connection.release()
})
}

module.exports = {
    register, login
}