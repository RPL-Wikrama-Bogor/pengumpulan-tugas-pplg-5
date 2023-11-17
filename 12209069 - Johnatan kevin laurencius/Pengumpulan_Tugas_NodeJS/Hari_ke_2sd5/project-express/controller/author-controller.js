const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// createPool: menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)
// kalau ada err, err nya dimunculin di console
pool.on('error', (err) => {
    console.error(err)
})
// membuat format hasil API kalau http request status code 400-an 
const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Book Not Found'
})
// membuat format hasil API kalau http request status code 200
const responseAuthorSuccess = (res, result, message) => res.status(200).json({
    success: true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;'    

    // menyambungkan ke konfigurasi db sebelumnya
    pool.getConnection((err, connection) => {
        // if tanpa {} bisa digunakan ketika proses dalam if nya hanya satu
        // kalau pas proses awal koneksi ketemu error, kode dibawah bakal diskip dan mengembalikan hasil respon errornya
        if (err) throw err;
        // menjalankan perintah sql : parameter 3
        // parameter 1 : variable yang isinya perintah sql
        // parameter 2 : (optional) : mengirim data (hanya dijalankan untuk tambah/update)
        // parameter 3 : function yang menangani reqs sqlnya : 2 parameter (mengambil data error, mengambil data hasil)
        connection.query(query, (err, result) => {
            if (err) throw err;
            // ketika berhasil, format API disamakan dengan di func responseSuccess
            responseAuthorSuccess(res, result, 'author successfuly fetched');
        });

        connection.release();
    });
};

const addAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    };

    // ? : parameter yang perlu diisi
    // ? diisi sama connection.query parameter ke 2
    const query = 'INSERT INTO author SET ?;';

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseAuthorSuccess(res, results, 'author successfully added');
        });
        connection.release();
    });
};

const getAuthor = (req, res) => {
    const id = req.params.id;
    const query = `SELECT * FROM author WHERE id = ${id};`;    

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if (err) throw err;

            if (results.length == 0) {
                responseAuthorNotFound(res);
                return;
            }

            responseAuthorSuccess(res, results, 'Author successfuly fetched');
        });

        connection.release();
    });
};

const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    };

    const id = req.params.id;
    const query = `UPDATE author SET ? WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            if(results.affectedRows == 0) {
                responseAuthorNotFound(res);
                return;
            };

            responseAuthorSuccess(res, results, 'Author successfuly updated');
        });

        connection.release();
    });
};

const deleteAuthor = (req, res) => {
    const id = req.params.id;
    const query = `DELETE FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if(err) throw err;

            if(results.affectedRows == 0) {
                responseAuthorNotFound(res);
                return;
            };

            responseAuthorSuccess(res, results, 'Author successfuly deleted')
        });

        connection.release();
    });
};

// kalau ga di export gabisa dipake, wajib
module.exports = {
    getAuthors,
    addAuthor,
    getAuthor,
    editAuthor,
    deleteAuthor
}
