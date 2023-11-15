const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const pool = mysql.createPool(dbConfig);

pool.on("error", (err) => {
  console.error(err);
});

const responseAuthorNotFound = (res) =>
  res.status(404).json({
    success: false,
    message: "Author Not Found",
  });

const responseSuccess = (res, results, message) =>
  res.status(200).json({
    success: true,
    message: message,
    data: results,
  });

const getAuthors = (req, res) => {
  const query = "SELECT * FROM Author;";

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, (err, results) => {
      if (err) throw err;
      responseSuccess(res, results, "Authors Successfully fetched");
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
    editor: req.body.editor
  };

  const query = "INSERT INTO Author SET ?;";

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, [data], (err, results) => {
      if (err) throw err;
      responseSuccess(res, results, "Author Successfully added");
    });
    connection.release();
  });
};

const getAuthor = (req, res) => {
  const id = req.params.id;
  const query = `SELECT * FROM Author WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, (err, results) => {
      if (err) throw err;

      if (results.length == 0) {
        responseAuthorNotFound(res);
        return;
      }

      responseSuccess(res, results, "Author Successfully fetched");
    });
    connection.release();
  });
};

const deleteAuthor = (req, res) => {
  const id = req.params.id;
  const query = `DELETE FROM Author WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, (err, results) => {
      if (err) throw err;
      if(results.affectedRows == 0 ) {
        responseAuthorNotFound(res);
        return;
      }
      responseSuccess(res, results, "Author Successfully deleted");
    });
    connection.release();
  });
};

const updateAuthor = (req, res) => {
  const id = req.params.id;
  const data = {
    name: req.body.name,
    year: req.body.year,
    publisher: req.body.publisher,
    city: req.body.city,
    editor: req.body.editor
  };
  const query = `UPDATE Author SET? WHERE id = ${id};`;
  pool.getConnection((err, connection) => {
    if (err) throw err;
    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      if(results.affectedRows == 0 ) {
        responseAuthorNotFound(res);
        return;
      }

      responseSuccess(res, results, "Author Successfully updated");
    });
    connection.release();
  });
};

module.exports = {
  getAuthors,
  addAuthor,
  getAuthor,
  deleteAuthor,
  updateAuthor,
};
