const dbConfig = require('../config/db_config')
//menyediakan saja
const mysql = require('mysql2')
//createpool: menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)


pool.on('error',(err) => {
    console.error(err)
})
// kalau ada error error nya di munculin di console

const responseAuthorNotFound = (res) => res.status(404).json({
    succes: false,
    message: 'Author Not Found',
})
     //membuat format hasil API kalau http response status code 400san


const responsesSuccess = (res,result,message) => res.status(200).json({
    succes: true,
    message: message,
    data: result
})
     //membuat format hasil API kalau http response status code 200san
    

const getAuthors = (req,res) => {
    const query = 'SELECT * FROM author;';
    //untuk menyambungkan ke konfigurasi db sebelumnya
    //parameter 1 : menangkap error
    //parameter 2: mencoba koneksi ke db nya  


    pool.getConnection((err,connection) => {
        // if tanpa {} bisa digunakan ketika proses dalam if hanya satu 
        //kalau pas proses awal koneksi ketemu err,kode di bawah bakal di skip dan mengembalikan hasil respone err mya
        if (err) throw err;
        // menjalankan perintah sql: parameter 3
        // parameter 1: variable yang isinya perintah sql
        // parameter 2(optional): variable yang mengirim data (hanya di jaalankan untuk tambah/ipdate)
        // parameter 3: function yang menangani hasil reqs sql nya: 2 parameter (mengambil data err,mengambil data hasil) 

       connection.query(query,(err, result) => {
        if (err) throw err;
        // ketika berhasil format API disamakan dengan di func responsesuccess
        responsesSuccess(res,result,'Author successfully fetched')

    })
    connection.release()
})
} 

const getAuthor = (req,res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id};`;

    pool.getConnection((err,connection) => {
        if (err) throw err;

        connection.query(query,(err,results) => {
            if (err) throw err;
            
            if (results.length == 0){
                responseAuthorNotFound(res);
                return;
            }
            responsesSuccess(res,results,'Author sucscessfully fetched');
        });
        connection.release();
    });
};
const addAuthor = (req,res) => {
    const data ={
        name:req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };

    const query = 'INSERT INTO author SET ?;';

    pool.getConnection((err,connection) => {
        if (err) throw err;
        connection.query(query,[data],(err,results) => {
        if (err) throw err;
         
        responsesSuccess(res,results,'Author successfully added');
        });
        connection.release();
    })
}

const editAuthor = (req,res) => {
    const data ={
        name:req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    }
    const id = req.params.id

    const query = `UPDATE author SET ? WHERE id = ${id}`

    pool.getConnection((err,connection) => {
        if (err) throw err

        connection.query(query,[data],(err,results) => {
            if (err) throw err

            if(results.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }
            responsesSuccess(res,results,'Author successfully update')
        })
        connection.release()
    })
    }

    const deleteAuthor = (req,res) => {
        const id = req.params.id

        const query = `DELETE FROM author WHERE id = ${id}`
        
        pool.getConnection((err,connection) => {
            if (err) throw err

            connection.query(query,(err,results) => {
            if (err) throw err

            if(results.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }

            responsesSuccess(res,results, 'Author seccessfully deleted')
        })
    connection.release()
    })
}   

module.exports = {
    getAuthors, addAuthor, getAuthor, editAuthor, deleteAuthor
}