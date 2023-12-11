const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
const jwt = require('jsonwebtoken')
const pool = mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

const accessTokenSecret = '2023-WikramA-exp'

const responseFailValidate = (res, massage) => res.status(400).json({
    success : false,
    massage: massage
})

const responseAuthSuccess = (res, token, massage, user) => res.status(200).json({
    success: true,
    token: token,
    massage: massage,
    user: user
})

const register = (req, res) => {
    if(req.body.email == null || req.body.username == null || req.body.password == null){
        responseFailValidate(res, 'Email/Username/Paswword/ Wajib di isi')
    }

    const data = {
        email: req.body.email,
        username: req.body.username,
        password: req.body.password
    }

    const query = 'INSERT INTO user SET ?;'

    pool.getConnection((err, connection) => {
        if(err) throw err

        connection.query(query, [data], (err, results) => {
            if(err) throw err
            
            if(results.affectedRows >= 1 ){
                const token = jwt.sign(
                    { email: data.email, username: data.username},
                    accessTokenSecret
                ) 
                    
                responseAuthSuccess(res, token, 'register successful', {
                    email: data.email,
                    username: data.username
                })
            }else{
                res.status(500).json('failed creating user')
            }
        })
        connection.release()
    })
}

const login = (req, res) => {
    if(req.body.email == null || req.body.password == null){
        responseFailValidate(res, 'Email/Password Wajib di isi')
    }

    const { email, password} = req.body

    const query = `SELECT * FROM user WHERE email = '${email}' AND password = '${password}'`

    pool.getConnection((err, connection) => {
        if (err) throw err
        
        connection.query(query, (err, results) => {
            if (err) throw err

            if(results.length >= 1){
                const user = results.pop()

                const token = jwt.sign({
                    email: user.email, username: user.username},
                    accessTokenSecret
                )

                responseAuthSuccess(res, token, 'Login Sukses', {
                    email: user.email,
                    username: user.username
                })

            } else {
                res.status(404).json({massage: 'email or password wrong'})
            }
        })
        connection.release()
    })
}

module.exports = {
    register, login
}