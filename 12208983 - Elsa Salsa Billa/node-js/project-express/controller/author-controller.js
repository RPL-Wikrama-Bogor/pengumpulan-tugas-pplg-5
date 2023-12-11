// menyediakan
const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// createPool : menghubungkan project ke db hanya sekali diawal
const pool = mysql.createPool(dbConfig)

// err dimunculin di console
pool.on('error', (err) => {
    console.error(err);
})
// membuat format hasil API kalau http response status codenya 400an
const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Author Not Found',
});

const responseSuccess = (res, result, message) => res.status(200).json({
    success: true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';

    // menghubungkan ke konfigurasi db sebelumnya
    // parameter pertama : menangkap error
    // parameter kedua : mencoba koneksi ke db nya
    pool.getConnection((err, connection) => {

        // if tanpa {} bisa digunakan ketika proses dlm if hanya satu
        // kalau pas proses awal koneksi ketemu err, kode dibawah ini bakal diskip & mengembalikan hasil response err nya
        if (err) throw err;

        // menjalankan perintah sql, parameternya ada 3
        // par 1 : variable yg isinya perintah sql
        // par 2 (optional) : mengirim data & hanya dijalankan untuk tambah/update
        // par 3 : function yg menangani hasil reqs sqlnya : 2 par (mengambil data err & mengambil data hasil)
        connection.query(query, (err, result) => {
            if (err) throw err;

            responseSuccess(res, result, 'author successfully fetched');
        });
        // memberhentikan koneksi kalau query nya udh selesai dijalanin
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

            responseSuccess(res, results, 'Author succesfully fetched');
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
        editor: req.body.editor,
    };

    // ? -> sifatnya sebagai parameter yg perlu diisi
    // ? -> diisi oleh connection.query parameter ke 2
    const query = 'INSERT INTO author SET ?;';

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseSuccess(res, results, 'Author succesfully added');
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
        editor: req.body.editor,
    }

    const id = req.params.id

    const query = `UPDATE author SET ? WHERE id = ${id};`

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

    const query = `DELETE FROM author WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if (results.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author successfully deleted')
        })

        connection.release()
    })
}

// wajib ditulis
module.exports = {
    getAuthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}