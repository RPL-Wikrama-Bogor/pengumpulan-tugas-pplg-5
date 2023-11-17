// const { query } = require('express')
const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
const pool = mysql.createPool(dbConfig)


pool.on('error', (err)=> {
    console.error(err)
})

const responseBookNotfound = (res) => res.status(404).json({
    sucsess: false,
    massage: 'Book Not Found',
})

const responseSuccess = (res, result, message) => res.status(200).json({
    sucsess: true,
    message: message,
    data: result
})

// get books
const getBooks = (req, res) => {
    const query = 'SELECT * FROM books;';

    pool.getConnection((err, connection) => {
        if (err) throw err; 

        connection.query(query,(err,results) => {
            if (err) throw err;

            responseSuccess(res,results, 'Books successfully fetched');
        });

        connection.release()
    });
};

// get book
const getBook = (req, res) => {
    const id = req.params.id;

    const query = `SELECT * FROM books WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if (err) throw err;

            if(results.length == 0) {
                responseBookNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Book successfully fetched');
        });
        connection.release();
    });
};

// add book
const addBook = (req, res) => {
    const data= {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count,
    };

    const query = "INSERT INTO books SET ?;";

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseSuccess(res, results, 'Book successfully added');
        });
        
        connection.release();
    });
};

const editBook = (req, res) => {
    const data= {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count,
    };

    const id = req.params.id

    const query = `UPDATE books SET ? WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if(err) throw err

            if(results.affectedRows == 0){
                responseBookNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Book successfully updated');
        });
        connection.release();
    });
};

const deleteBook = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM books WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if(err) throw err

            if(results.affectedRows == 0) {
                responseBookNotfound(res);
                return;
            }
            responseSuccess(res, results, 'Book successfully deleted')
        });
        connection.release();
    });
};

module.exports = {
    getBooks, getBook, addBook, editBook, deleteBook
}