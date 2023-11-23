const dbConfig = require('../config/db-config');
const mysql = require('mysql2');
// const { Connection } = require('mysql2/typings/mysql/lib/Connection');
const pool = mysql.createPool(dbConfig);

pool.on('error', (error) => {
    console.log((error));
});
const getBooks = (req, res) => {
    const { sort, AscDesc } = req.query; 


    // sort & orderby
    let query = 'SELECT * FROM books;';

    if (sort != null) {
        let query = `SELECT * FROM books ORDER BY ${sort} ${AscDesc};`;
    }


    pool.getConnection((error, connection) => {
        if (error) throw error; 

        connection.query(query, (error, results) => {
            if (error) throw error;

            sendResponse(res, true, 'Buku Berhasil Ditemukan!', results, 200)
            connection.release();
        });
    });
};
const getBook = (req, res) => {
    const bookId = req.params.id;
    const query = 'SELECT * FROM books WHERE id = ?  ;';

    pool.getConnection((error, connection) => {
        if (error) throw error; 

        connection.query(query, [bookId], (error, results) => {
            if (error) throw error;
            
            if (results.length < 1){
                sendResponse(res, false, 'Buku Tidak Ditemukan', results, 200)
                return;
            }
            
            sendResponse(res, true, 'Buku Ditemukan', results, 200)
            connection.release();
            });
        });
    };


const addBook = (req, res) => {
    // id, nama, penulis, penerbit, halaman, tahun
    
    

    const dataBuku = {
        nama: req.body.nama,
        penulis: req.body.penulis,
        penerbit: req.body.penerbit,
        halaman: req.body.halaman,
        tahun: req.body.tahun
    }
    // Prepared Statement
    const query = 'INSERT INTO books SET ? ; ';

    pool.getConnection((error, connection) => {
        if(error) throw error;

        connection.query(query, [dataBuku], (error, results) =>{
            if(error) throw error;
            
            sendResponse(res, true, 'Buku Berhasil Ditambahkan', results, 200)
            connection.release();

            });

        });
    };
const editBook = (req, res) => {
    const { id } = req.params;

    const dataBuku = {
        nama: req.body.nama,
        penulis: req.body.penulis,
        penerbit: req.body.penerbit,
        halaman: req.body.halaman,
        tahun: req.body.tahun
    };

    const query = `UPDATE books SET ? WHERE id = '${id}';`;

    pool.getConnection((error, connection) => {
        if(error) throw error;

        connection.query(query, [dataBuku], (error, results) => {
            if (error) throw error;

            if (results.affectedRows < 1){
                sendResponse(res, false, 'Buku Tidak Ditemukan', null, 404)
                return;
            }
            
                sendResponse(res, true, 'Buku Berhasil Di Edit!', results, 200)
                
            });
            connection.release();
        })
    };
const deleteBook = (req, res) => {
    const deleteId = req.params.id;
    const query = 'DELETE FROM books WHERE id = ?; ';

    pool.getConnection((error, connection) => {
        if (error) throw error;

        connection.query(query, [deleteId], (error, results) => {
            if (error) throw error;

            sendResponse(res, true, 'List Berhasil Di Hapus!', results, 200)
            connection.release();
        })
    })
};

const sendResponse = (res, success, message, data, statusCode) => res.status(statusCode).json({
    success: success,
    message: message,
    data: data
})



module.exports = {
    getBooks, getBook,
    addBook, editBook, 
    deleteBook
}