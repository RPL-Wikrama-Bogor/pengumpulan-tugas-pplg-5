// menyediakan
const dbConfig = require('../config/db-config');
const mysql = require('mysql2');
// createPool: menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig);
//kalau ada error, error nya dimunculkan di console
pool.on('error', (err) => {
    console.error(err);
})
//membuat format hasil API kalau htt response status code nya 400-an
const responseAuthorNotFound = (res) => res.status(404).json({
    succes:false,
    message: 'Book not found'
})
//membuat format hasil API kalau htt response status codenya 200
const responseSuccess = (res, result, message) => res.status(200).json({
    succes:true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';
    //menyambungkan ke konfirugrasi db sblmnya
    //parameter 1 : menangkap error
    //parameter 2 : mencoba koneksi ke db nya

    pool.getConnection((err, connection)=> {
        //if {} bisa digunakan ketika proses dlm if hanya satu
        //kalau pas proses awal koneksi ketemu err, kode dibawah bakal di skip dan mengembalikan hasil response err-nya
        if (err) throw err;
        // menjalankan perintah sql : parameter 3
        //menalajankan perintah sql : parameter 3
        //parameter 1 : variable yg isinya perintah sql
        //parameter 2(opsional) : variable yang mengirim data(hanya dijalankan untuk tambah/update)
        //parameter 3 : function yang menangani hasil req sql nya : 2 parameter (mengambil data err, menambil data hasil)
        connection.query(query, (err, result) => {
            if (err) throw err;
            
            //ketika berhasil format API disamakan dengan function  responseSuccess
            responseSuccess(res, result, 'author successfully fetched');
            
        })
        //memberhentikan koneksi kalau query nya sudah berhasil dijalankan 
        connection.release()
    })

    
}
const getAuthor = (req, res) => {
    const id = req.params.id;
    const query = `SELECT * FROM author WHERE id = ${id}`;
    
    
    pool.getConnection((err, connection)=> {
        if (err) throw err;
        
        connection.query(query, (err, result) => {
            if (err) throw err;
            
            if (result.length == 0){
                responseAuthorNotFound(res);
                return;
            }
            responseSuccess(res, result, 'author successfully fetched');

        })
        connection.release()
    })

    
}
const addAuthors = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };
    //?: parameter yang perlu diisi
    //?: diisi sama connection.query parameter ke-3
    const query = "INSERT INTO author SET ?;";

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, result) => { 
            if (err) throw err;

            responseSuccess(res, result, 'book successfully added');
        });
        connection.release();
    })
}
const editAuthors = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    }
    const id = req.params.id

    const query = `UPDATE author SET ? WHERE id = ${id}`

    pool.getConnection((err, connection) => {
       if (err) throw err

   connection.query(query, [data], (err, result) => {
       if(err) throw err

       if(result.affectedRows == 0){
           responseAuthorNotFound(res)
           return
       }
       responseSuccess(res, result, 'author successfully updated')
   })
       connection.release()
    })
}
const deleteAuthors = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id}` 

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if(result.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author successfully deleted')
        })
        connection.release()
    })
}



// kalau tidak di exports tidak bisa dipake jadi wajib
module.exports = {
    getAuthors,
    getAuthor,
    addAuthors,
    editAuthors,
    deleteAuthors
}