// menyediakan db
const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// menggabungkan projek ke db
const pool =  mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

const responseAuthorNotFound = (err) => res.status(404).json({
    success: false,
    message: 'Author not found'
})

const responseSuccess = (res, results, message) => res.status(200).json({
    success: true,
    message: message,
    data: results
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM authors;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            responseSuccess(res, results, 'authors successfully fetched')
        })
        connection.release()
    })
}

const addAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    }

    const query = 'INSERT INTO authors SET ?;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err

            responseSuccess(res, results, 'Author successfully added')
        })
        connection.release()
    })
}   

const getAuthor = (req, res) => {
    const id = req.params.id

    const query = `SELECT * FROM authors WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err
            
            if (results.lenght == 0) {
                responseAuthorNotFound(res)
                return
            }
            responseSuccess(res, results, 'Author successfully fetched')
        })
        connection.release()
    })
}
const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    }
    const id =  req.params.id

    const query = `UPDATE authors SET ? WHERE id = ${id};`

pool.getConnection((err, connection) => {
    if(err) throw err

    connection.query(query, [data], (err, results) => {
        if(err) throw err

        if(results.affectedRows == 0) {
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

    const query = `DELETE FROM authors WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if (results.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author succesfully deleted')
        })
        connection.release()
    })
}



module.exports = {
    getAuthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}