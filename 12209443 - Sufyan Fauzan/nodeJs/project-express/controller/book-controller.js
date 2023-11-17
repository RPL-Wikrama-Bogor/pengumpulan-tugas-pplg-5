const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const pool = mysql.createPool(dbConfig);
pool.on("error", (err) => {
  console.log(err);
});

const responseBookNotFound = (res) =>
  res.status(404).json({
    success: false,
    message: "Book not found",
  });

const responseSuccess = (res, result, message) =>
  res.status(200).json({
    success: true,
    message: message,
    data: result,
  });

const getBooks = (req, res) => {
  const query = "SELECT * FROM books;";

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, results) => {
      if (err) throw err;

      responseSuccess(res, results, "Books successfully");
    });
    connection.release();
  });
};

const addBooks = (req, res) => {
  const data = {
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

      responseSuccess(res, results, "Books successfully added");
    });
    connection.release();
  });
};

const getBook = (req, res) => {
  const id = req.params.id;
  const query = `SELECT * FROM books WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, results) => {
      if (err) throw err;

      if (results.length == 0) {
        responseBookNotFound(res);
        return;
      }

      responseSuccess(res, results, "Books successfully fetched");
    });
    connection.release();
  });
};

const DeleteBook = (req, res) => {
  const id = req.params.id;
  const query = `DELETE FROM books WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, results) => {
      if (err) throw err;

      if (results.affectedRows == 0) {
        responseBookNotFound(res);
        return;
      }
      responseSuccess(res, results, "Books successfully removed");
    });
    connection.release();
  });
};

const EditBook = (req, res) => {
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

    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      if (results.affectedRows == 0) {
        responseBookNotFound(res);
        return;
      }

      responseSuccess(res, results, "Book successfully updated");
    });
    connection.release();
  });
};

module.exports = {
  getBooks,
  addBooks,
  getBook,
  DeleteBook,
  EditBook,
};
