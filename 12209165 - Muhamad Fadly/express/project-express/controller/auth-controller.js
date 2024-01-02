//menyediakan 
const dbConfig = require('../config/db-confing')
//createPool : menghubungkan project ke database hanya sekali di awal
const mysql = require('mysql2')
const jwt = require('jsonwebtoken')
const pool = mysql.createPool(dbConfig)
//kalau ada err,  err nya muncul di console
pool.on('error',(err) =>{
    console.log(err)
})

const accessTokensecret = '2023-wikrama-exp'

const responseFaolValidate = (res, massage) => res.status(400).json({
    status: false, 
    message: massage
})
const responseAuthSuccess = (res, token, massage, user)=> res.status(200).json({
    success:true,
    token:token,
    massage:massage,
    user:user
})
const register = (req, res) => {
    if (req.body.email == null || req.body.username == null|| req.body.password == null) {
        responseFaolValidate(res, 'Email/username/password wajid di isi')
        
    }
    const data = {
        username: req.body.username,
        email: req.body.email,
        password: req.body.password
    }
    const query = 'INSERT INTO users SET ?;'
    pool.getConnection((err, connection)=>{
        if(err) throw err
        connection.query(query,[data],(err,results)=>{
            if(err) throw err

            if (results.affectedRows >=1) {
                const token = jwt.sign(
                    {
                        email: data.email, username: data.username,
                    },
                    accessTokensecret,
               
                
                )
                responseAuthSuccess(res, token,'Register Success',{
                    email: data.email,
                    username: data.username,
                })
            } else{
                res.status(500).json('failes creating user')
            }
            
        })
        connection.release()
    })
}
const login = (req,res) =>{
    if (req.body.email == null || req.body.password == null ) {
        responseFaolValidate(res, 'Username atau Password Wajib Diisi')
        
    }
    const {email, password} = req.body

    const query = `SELECT * FROM users WHERE email = '${email}' AND password = '${password}'`
    pool.getConnection((err,connection)=> {
        if (err) throw err
        
        connection.query(query,(err, results) => {
            if (err) throw err

            if (results.length >= 1){
                const user = results.pop()

                const token = jwt.sign({
                    email:user.email,
                    username:user.username,
                    },accessTokensecret)

                responseAuthSuccess(res,token,"Login Berhasil",{
                    email:user.email,
                    username:user.username,
                    })
            }else{
                res.status(404).json({massage: ' Email or password is failed'})
            }
        })
        connection.release()
    })
    
}
module.exports={
    register,
    login
};

                
            
