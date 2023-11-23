
const dbConfig = require('../config/db-confing')

const mysql = require('mysql2')
const pool = mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

const responBookNotFound = (res) =>  res.status(404).json({
   
    succes: false,
    message: 'book Not found'
})

const responseSuccess = (res, result ,massage) => res.status(200).json({
    success: true,
    massage:massage,
    data :result,
})
//membuat
const getBooks = (req, res) => {
    const query = 'SELECT * FROM books';

    pool.getConnection((err ,connection) => {
        if(err) throw err

        connection.query(query, (err, results) =>{
            if (err) throw err

            responseSuccess(res, results, 'Books successfully fetched')

        })
        connection.release()
    })
}

//menambah
const addBook = (req, res)=> {
    const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count,
        
    }
    
    const query = `INSERT INTO books SET ?;`
    
    pool.getConnection((err ,connection) => {
        if(err) throw err
        connection.query(query, [data], (err, results) =>{
            if (err) throw err
            responseSuccess(res, results,'Book added Successfully')
        })
        connection.release()
    })
    }

//cari
    const getBook = (req, res) =>{
        const id = req.params.id;
        const query = `SELECT * FROM books WHERE id = ${id}`
        pool.getConnection((err ,connection) => {
            if(err) throw err
            connection.query(query, (err,results) =>{
                if (err) throw err
                if (results.length == 0){
                    responBookNotFound(res)
                    return
                }
                responseSuccess(res, results, "book sucessfuly fethed")
                })
            connection.release()
        })
    }
//edit
const editBook = (req, res) =>{
    const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count,
        
    }
    const id = req.params.id;
    const query = `UPDATE books SET ? WHERE id=${id}`
        pool.getConnection((err ,connection) => {
            if(err) throw err
            connection.query(query, [data], (err, results) =>{
                if (err) throw err

                if(results.affectedRows == 0){
                    responBookNotFound(res)
                    return
                }
                responseSuccess(res, results,"book successfuly updated")
            })
            connection.release()
        })
    }

//delete book
const deleteBook = (req, res)=>{

    const id = req.params.id;
    const query = `DELETE FROM books WHERE id=${id}`
    pool.getConnection((err ,connection) => {
        if(err) throw err
        connection.query(query, (err, results) =>{
            if (err) throw err
            if(results.affectedRows == 0){
                responBookNotFound(res)
                return
            }
            responseSuccess(res, results, 'Book deleted successfully')
        })
        connection.release()
    })
    
}
  

module.exports = {
    getBooks,
    addBook,
    getBook,
    editBook,
    deleteBook
    
}
