const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const pool = mysql.createPool(dbConfig);

pool.on("error", (err) => {
  console.error(err);
});

const responseBookNotFound = (res) =>
  res.status(404).json({
    success: false,
    message: "Book Not Found",
  });

const responseSuccess = (res, results, message) =>
  res.status(200).json({
    success: true,
    message: message,
    data: results,
  });

const getBooks = (req, res) => {
  const query = "SELECT * FROM books;";

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, (err, results) => {
      if (err) throw err;
      responseSuccess(res, results, "Books Successfully fetched");
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

  const query = "INSERT INTO books SET ?;";

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, [data], (err, results) => {
      if (err) throw err;
      responseSuccess(res, results, "Book Successfully added");
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

      responseSuccess(res, results, "Book Successfully fetched");
    });
    connection.release();
  });
};

const deleteBook = (req, res) => {
  const id = req.params.id;
  const query = `DELETE FROM books WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, (err, results) => {
      if (err) throw err;
      if(results.affectedRows == 0 ) {
        responseBookNotFound(res);
        return;
      }
      responseSuccess(res, results, "Book Successfully deleted");
    });
    connection.release();
  });
};

const updateBook = (req, res) => {
  const id = req.params.id;
  const data = {
    name: req.body.name,
    author: req.body.author,
    publisher: req.body.publisher,
    year: req.body.year,
    page_count: req.body.page_count,
  };
  const query = `UPDATE books SET? WHERE id = ${id};`;
  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      if(results.affectedRows == 0 ) {
        responseBookNotFound(res);
        return;
      }

      responseSuccess(res, results, "Book Successfully updated");
    });
    connection.release();
  });
};

module.exports = {
  getBooks,
  addBook,
  getBook,
  deleteBook,
  updateBook,
};
