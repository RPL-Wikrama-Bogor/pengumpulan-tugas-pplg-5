const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// const { connect } = require('../routes/book-route')
// const { query } = require('express')
const pool = mysql.createPool(dbConfig)
ji               

pool.on('error', (err) => {
    console.error(err)
})
//membaut format hasil api kalo http response status codenya 404
const responseAuthorNotFound = (res) => res.status(404).json({
    seccesa : false,
    message:'Author Not Found'
})
// membuat format hasil api kalo http response status codenya 200
const responseSuccess = (res,result,message) => res.status(200).json({
    success : true,
    message : message,
    data:result

})
//mengambil semua data  
const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';

    //menyambungkan konfigurasi db isinya
    //param 1= menangkap error
    //param 2= mencoba koneksi ke db nya
pool.getConnection((err, connection) => {
    //if tana {} bisa digunskan ketika proses else if nya hanya satu
    //kalau pas proses awal koneksi ketamu err , kode dibawah bakal diskip dan mengembalikan hasil response err nya
    if (err) throw err 
    //menjalankan printah sql
    //param 1= variabel yang isinya sql
    //param 2= (optional) : mengirim data (hanya di jalankan untuk tanah /up)
    //param 3= func yang menangani hasil reqs sql nya
    connection.query(query, (err, results) =>{
        if (err) throw err
        responseSuccess(res,results,'Author successfully fetched')
    })
    connection.release()
})
}

const getAuthor = (req,res) => {
        const id = req.params.id;

        const query = `SELECT * FROM author WHERE id = ${id};`;

        pool.getConnection((err, connection) => {
            if (err) throw err;

            connection.query(query, (err,results) => {
                if (err) throw err;


                if(results.length == 0 ) {
                    responseAuthorNotFound(res);
                    return;
                }
                responseSuccess(res,results,'Author successfully fetched')
            });

            connection.release();
        });
    };

const addAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher:req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    };
    //?= param yang perlu di isi dan ? diisi sama connecction .query

    const query = 'INSERT INTO author SET ?;';
    pool.getConnection((err,connection) => {
        if (err) throw err;

        connection.query(query,[data],(err,results) => {
            if (err) throw err;
            responseSuccess(res, results,'Author successfully added');
        });
        connection.release();
    });

    
}


const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year:req.body.year,
        publisher:req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    }

    const id = req.params.id

    const query =`UPDATE author SET ? WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err

            if(results.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, results,'Author successfully added')
        })
        connection.release()
    })

}

const deleteAuthor = (req, res ) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id}`
    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if(results.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }
            responseSuccess(res, results,'Author successfully added')
        })
        connection.release()
    })
}


//kalo gk di exports gk bisa di jalankan jadi hukum nya wwajib`                                             
module.exports={
    getAuthors, getAuthor, addAuthor,editAuthor,deleteAuthor
}