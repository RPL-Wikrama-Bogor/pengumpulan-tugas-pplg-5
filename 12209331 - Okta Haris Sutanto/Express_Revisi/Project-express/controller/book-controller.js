const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
const pool =  mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

const responseBookNotFound = (err) => res.status(404).json({
    success: false,
    message: 'Book not found'
})

const responseSuccess = (res, results, message) => res.status(200).json({
    success: true,
    message: message,
    data: results
})

const getBooks = (req, res) => {
    const query = 'SELECT * FROM books;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            responseSuccess(res, results, 'Books successfully fetched')
        })
        connection.release()
    })
}

const addBook = (req, res) => {
    const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count
    }

    const query = 'INSERT INTO books SET ?;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err

            responseSuccess(res, results, 'Book successfully added')
        })
        connection.release()
    })
}   

const getBook = (req, res) => {
    const id = req.params.id

    const query = `SELECT * FROM books WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err
            
            if (results.lenght == 0) {
                responseBookNotFound(res)
                return
            }
            responseSuccess(res, results, 'Book successfully fetched')
        })
        connection.release()
    })
}
const editBook = (req, res) => {
    const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count
    }
    const id =  req.params.id

    const query = `UPDATE books SET ? WHERE id = ${id};`

pool.getConnection((err, connection) => {
    if(err) throw err

    connection.query(query, [data], (err, results) => {
        if(err) throw err

        if(results.affectedRows == 0) {
            responseBookNotFound(res)
            return
        }

        responseSuccess(res, results, 'Book successfully updated')
    })

    connection.release()
})
}

const deleteBook = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM books WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if (results.affectedRows == 0) {
                responseBookNotFound(res)
                return
            }

            responseSuccess(res, results, 'Book succesfully deleted')
        })
        connection.release()
    })
}



module.exports = {
    getBooks, getBook, addBook, editBook, deleteBook
}