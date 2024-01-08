// const { Connection } = require('mysql2/typings/mysql/lib/Connection')
// const { query } = require('express')
const dbConfig = require('../config/db_config')
const mysql = require('mysql2')
// createpool: menghubhngkan project db 
const pool = mysql.createPool(dbConfig)
// const { connect } = require('../routes/book-route')

//kalau ada err ,errnya d munculin d console
pool.on('error', (err)=> {
    console.error(err)
})

//membuat format hasil api kalau http response status codenya 400
const responseAuthorNotfound = (res) => res.status(404).json({
    sucsess: false,
    massage: 'Author Not Found',
})


//membuat format hasil api kalau http response status codenya 200

const responseSuccess = (res, result, message) => res.status(200).json({
    sucsess: true,
    message: message,
    data: result
})

// get author
const getauthors = (req, res) => {
    const query = 'SELECT * FROM author;';
//menyambungkan ke konfigurasi db sblmny
    pool.getConnection((err, connection) => {
        if (err) throw err; 

        //menjalankan perintah sql :parameter nya ada 3
        //parameter 1: variabel yg isinya perintah sql
        //parameter 2 (optional : variabel yg mengirim dsts hanya dijalankan untuk tambah/update)
        //parameter 3 function yg menangani hasil request sqlnya : 2 parameter 
        //(mengambil data err, mengambil data hasil)
        connection.query(query,(err,results) => {
            if (err) throw err;
//ketika berhasil, format api disamakan 
            responseSuccess(res,results, 'author successfully fetched');
        });
//memberehentikan koneksi kalau querynya udah elesai dijalankan
        connection.release()
    });
};

// get book
const getAuthor= (req, res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id}`;;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if (err) throw err;

            if(results.length == 0) {
                responseAuthorNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Author successfully fetched');
        });
        connection.release();
    });
}

// add book
const addAuthor = (req, res) => {
    const data = {
        name: req.body.name,
            year: req.body.year,
            publisher: req.body.publisher,
            city: req.body.city,
            editor: req.body.editor,
        };
        //?untuk parameter yg perlu disi
        //?diisi sama connection.query parameter ke 2
    const query = "INSERT INTO author SET ?;";

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseSuccess(res, results, 'Author successfully added');
        });
        
        connection.release();
    })
}
const editAuthor= (req,res) => {
    const data = {
    name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    }
  const id = req.params.id

  const query = `UPDATE author SET ? WHERE  id = ${id};`

  pool.getConnection((err, connection)=> {
      if(err) throw err

      connection.query(query, [data], (err, results) =>{
        if (err) throw err

        if(results.affectedRows == 0){
            responseAuthorNotfound (res)
            return
        }
        responseSuccess(res,results, 'Author successfully updated')
      })
      connection.release()
  })
}


const deleteAuthor= (req, res) =>{
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id};`
    //{id}memanggil

    pool.getConnection((err, connection) => {
        if(err) throw err

        connection.query(query,(err, results)=>{
            if(err) throw err

            if(results.affectedRows == 0) {
                responseAuthorNotfound (res)
                return
            }
            responseSuccess(res, results, 'Author successfully delete')
        })
        connection.release()
    })
}

//kalau ga export gabisa dipake hukumnya wajib
module.exports = {
    getauthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}