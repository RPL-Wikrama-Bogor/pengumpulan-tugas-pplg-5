const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const pool = mysql.createPool(dbConfig);
// klo ada err, err akan dijalankan di console
pool.on("error", (err) => {
  console.log(err);
});

const responseBookNotFound = (res) =>
  res.status(404).json({
    success: false,
    message: "Author not found",
  });

const responseSuccess = (res, result, message) =>
  res.status(200).json({
    success: true,
    message: message,
    data: result,
  });

const getAuthors = (req, res) => {
  // connet to tabel
  const query = "SELECT * FROM author;";

  // params 1 : menangkap error
  // params 2 : mencoba koneksi ke db nya
  pool.getConnection((err, connection) => {
    // if tanpa () bisa digunakan ketika proses dlm if hanya satu
    // kalau pas proses awal koneksi ketemu err, kode di bawah bakal di skip dan mengembalikan hasil respons err-nya
    if (err) throw err;

    // menjalankan perintah sql : params 3
    // params 1 : variable yg isinya perintah sql
    // params 2 : (opsional) mengirim data (hanya dijalankan untuk tambah/update)
    // params 3 : function yg menangani hasil rrqs sql nya : 2 params
    connection.query(query, (err, results) => {
      if (err) throw err;

      responseSuccess(res, results, "Author successfully");
    });
    connection.release(); // memberhentikan
  });
};

const addAuthors = (req, res) => {
  const data = {
    name: req.body.name,
    year: req.body.year,
    publisher: req.body.publisher,
    city: req.body.city,
    editors: req.body.editors
  };

  // ? : parameter yg perlu diisi
  // ? : diisi dengan connection
  const query = "INSERT INTO author SET ?;";

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      responseSuccess(res, results, "Author successfully added");
    });
    connection.release();
  });
};

const getAuthor = (req, res) => {
  const id = req.params.id;
  const query = `SELECT * FROM author WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, results) => {
      if (err) throw err;

      if (results.length == 0) {
        responseBookNotFound(res);
        return;
      }

      responseSuccess(res, results, "Author successfully fetched");
    });
    connection.release();
  });
};

const DeleteAuthor = (req, res) => {
  const id = req.params.id;
  const query = `DELETE FROM author WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, results) => {
      if (err) throw err;

      if (results.affectedRows == 0) {
        responseBookNotFound(res);
        return;
      }
      responseSuccess(res, results, "Author successfully removed");
    });
    connection.release();
  });
};

const EditAuthor = (req, res) => {
  const data = {
    name: req.body.name,
    year: req.body.year,
    publisher: req.body.publisher,
    city: req.body.city,
    editors: req.body.editors
  };

  const id = req.params.id;
  const query = `UPDATE author SET ? WHERE id = ${id};`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      if (results.affectedRows == 0) {
        responseBookNotFound(res);
        return;
      }

      responseSuccess(res, results, "Author successfully updated");
    });
    connection.release();
  });
};

module.exports = {
  getAuthors,
  addAuthors,
  getAuthor,
  DeleteAuthor,
  EditAuthor,
};
