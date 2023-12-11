
const dbConfig = require('../config/db-config');
const mysql = require('mysql2');

const pool = mysql.createPool(dbConfig);

pool.on('error', (err) => {
    console.log(err)
});

const responseBookNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Book Not Found',
});

const responseSuccess = (res,result,message) => res.status(200).json({
    success: true,
    message: message,
    result: result
})

const getBooks = (req, res) => {
    const query = 'SELECT * FROM books';

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query,(err, results) => {
            if (err) throw err;

            responseSuccess(res,results,'Books successfully fatched')
    })
    connection.release()
})
}

const getBook = (req,res) =>{
    const id = req.params.id

    const query = `SELECT * FROM books WHERE id = ${id}`
    pool.getConnection((err, connection) => {
        if(err) throw err

        connection.query(query, (err, result) => {
            if(err) throw err

            if(result.length == 0){
                responseBookNotFound(res)
                return
            }
            responseSuccess(res, result ,'Book successfully fetched')
        })
        connection.release()
    })
}

const addBook = (req,res) => {
    const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count
    }

    const query = 'INSERT INTO books SET ?'

    pool.getConnection((err, connection ) => {
        if(err) throw err

        connection.query(query, [data],(err,result) => {
            if(err) throw err

            responseSuccess(res, result, 'Book successfully added')
        })
        connection.release()
    }) 
}

const editBook  = (req,res) => {
      const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count
      }
      const id = req.params.id

      const query = `UPDATE books SET ? WHERE id = ${id}`;

      pool.getConnection((err ,connection) => {
            if(err) throw err

            connection.query(query, [data],(err,results) => {
                if(err) throw err

                if(results.affectedRows == 0){
                    responseBookNotFound(res)
                    return
                }
                responseSuccess(res,results, `Book successfully updated`)
            })
            connection.release()
      })
}  

const deleteBook = (req,res) => {
    const id = req.params.id

    const query = `DELETE FROM books WHERE id =${id}`

    pool.getConnection((err,connection) => {
        if(err) throw err

        connection.query(query ,(err,results)=> {
            if(err) throw err

            if(results.affectedRows == 0){
                responseBookNotFound(res)
                return
            }
            responseSuccess(res,results,`Book successfully deleted`)
        })
        connection.release()
    })
} 

module.exports = {getBooks, addBook, getBook,editBook, deleteBook}