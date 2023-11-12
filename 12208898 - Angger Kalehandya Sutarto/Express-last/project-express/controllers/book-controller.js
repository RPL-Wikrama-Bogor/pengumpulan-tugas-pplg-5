// const { response, json } = require('express');
const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
// const { Connection } = require('mysql2/typings/mysql/lib/Connection');
const pool = mysql.createPool(dbConfig);

pool.on("error", (err) => {
  console.log(err);
});

const responseBookNotFound = (res) =>
  res.status(404).json({
    succes: false,
    message: "Book Not Found",
  });

const responseSucces = (res, result, message) =>
  res.status(200).json({
    succes: true,
    message: message,
    data: result,
  });

const getBooks = (req, res) => {
  const query = "SELECT * FROM books";

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, result) => {
      if (err) throw err;

      responseSucces(res, result, "Books successfully fetched");
    });
    connection.release();
  });
};

const getBook = (req, res) => {
  const id = req.params.id;
  const query = `SELECT * FROM books WHERE id = ${id}`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, result) => {
      if (err) throw err;

      if (result.length == 0) {
        responseBookNotFound(res);
        return;
      }

      responseSucces(res, result, "Books successfully fetched");
    });
    connection.release();
  });
};

const addBook = (req, res) => {
  const data = {
    name: req.body.name,
    author: req.body.author,
    publisher: req.body.publisher,
    year: req.body.year,
    page_count: req.body.page_count,
  };

  const query = `INSERT INTO books SET ?;`;

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, [data], (err, result) => {
      if (err) throw err;

      responseSucces(res, result, "Book successfully added");
    });

    connection.release();
  });
};

const editBook = (req, res) => {
  const data = {
    name: req.body.name,
    author: req.body.author,
    publisher: req.body.publisher,
    year: req.body.year,
    page_count: req.body.page_count,
  };

  const id = req.params.id;

  const query = `UPDATE books SET ? WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, [data], (err, result) => {
      if (err) throw err;

      if (result.affectedRows == 0) {
        responseBookNotFound(res);
        return;
      }

      responseSucces(res, result, "Book Successfully Edited");
    });
    connection.release();
  });
};

const deleteBook = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM books WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;
    
        connection.query(query, (err, result) => {
          if (err) throw err;
    
          if (result.affectedRows == 0) {
            responseBookNotFound(res);
            return;
          }
    
          responseSucces(res, result, "Book Successfully Deleted");
        });
        connection.release();
      });

}

module.exports = {
  getBooks,
  addBook,
  getBook,
  editBook,
  deleteBook
};
