const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
const pool = mysql.createPool(dbConfig) // createPool : menghubungkan project ke db hanya sekali diawal

pool.on('error', (err) => {
    console.error(err)
}) // jika ada error, error akan muncul di console

const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Author Not Found'
}) // membuat format hasil APi klaau http response status codenya 400an

const responseSuccess = (res, result, message) => res.status(200).json({
    success: true,
    message: message,
    data: result
}) // membuat format hasil APi kalau http status code nya 200

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author';

    //menymbungkan ke konfigurasi db sebelumnya
    //parameter pertama berfungsi sebagai : menangkap error
    //parameter kedua berfungsi sebagai : mencoba koneksi ke dbnya
    pool.getConnection((err, connection) => {
        //menyambungkan dengan database
        if (err) throw err;
        // throw : kalau pas proses awal koneksi ketemu err, kode di bawah bakal di skip dan mengembalikan hasil response errnya
        
        connection.query(query, (err, results) => {
            // menjalankan perintah sql : parameter 3
            // parameter 1 : variabel yang isi nya perintah sql
            // parameter 2 : variabel (optional) mengirim data  (hanya dijalankan untuk tambah/update)
            // parameter 3 : function yang menangani hasil req sqlnya : 2 parameter (mengambil data error, mengambil data hasil)
            if (err) throw err;
            // ketika berhasil format APi yang disamakan 
            responseSuccess(res, results, 'Author successfully fetched')
        })

        connection.release()
        //untuk memberhentikan koneksi jika query sudah selesai
    })
}

const getAuthor = (req, res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if (err) throw err;

            if (results.length == 0 ){
                responseAuthorNotFound(res);
                return;
            }

            responseSuccess(res, results, 'Author successfully fetched');
        });

        connection.release();
    });
};

const addAuthor = (req, res) => {
    const data = {
        //sebelum : disamakan degan di database
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };

    const query = 'INSERT INTO author SET ?;';
    // ? digunakan untuk menandakan parameter yang perlu diisi + diisi oleh connection.query parameter kedua

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseSuccess(res, results, 'Author successfully added');
        });

        connection.release();
    })
}

const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    }

    const id = req.params.id

    const query = `UPDATE author SET ? WHERE id= ${id}`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err

            if (results.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author successfully updated')
        })
        connection.release()
    })
}

const deleteAuthor = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id}`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if (results.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author successfully delete')
        })
        connection.release()
    })
}


// gk di export gk bisa dipake, WAJIB
module.exports = {
    getAuthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}