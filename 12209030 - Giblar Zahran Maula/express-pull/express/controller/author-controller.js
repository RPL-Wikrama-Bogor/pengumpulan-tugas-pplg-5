const res = require("express/lib/response");
const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const req = require("express/lib/request");
const pool = mysql.createPool(dbConfig);

pool.on("error", (err) => {
  console.error(err);
});
//membuat format hasil api kalau http response status code nya 400
const responseAuthorNotFound = (res) =>
  res.status(404).json({
    success: false,
    message: "No Author found",
  });
//membuat format hasil api kalau http response status code nya 200
const responseSuccess = (res, result, message) =>
  res.status(200).json({
    success: true,
    message: message,
    data: result,
  });
  
  const getAuthors = (req, res) => {
    const query = "SELECT * FROM author";
    //menyambungkan ke ke konfigurasi di db sebelumny
    
    //parameter pertama sebagai menangkap
    //parameter kedua mencoba koneksi ke db nya
    pool.getConnection((err, connection) => {
      //if tanpa {} bisa digunakan ketika proses dalam if banya satu
      if (err) throw err;
      //kalau pas proses awal koneksi ketemu error, kode dibawah bakal di skip dan mengembalikan hasil response error nya

      //untuk menjalankan perintah sql
    connection.query(query, (err, results) => {
      if (err) throw err;
      responseSuccess(res, results, "Author successfully fetched");
    });
    connection.release;//menghentikan koneksi jika sudah selesai agar tidak terus menerus terhubung
  });
};

const addAuthor = (req, res) => {
  const data = {
    name: req.body.name,
    year: req.body.year,
    publisher: req.body.publisher,
    city: req.body.city,
    editor: req.body.editor,
  };
  const query = "INSERT INTO author SET ?;";
  //fungsi ? untuk sebagai parameter yang harus diisi
  // ?diisi sama connection.query parameter ke 2
  

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      responseSuccess(res, results, "Author added successfully");
    });
    connection.release();
  });
};

const getAuthor = (req, res) => {
  const id = req.params.id;

  const query = `SELECT * FROM author WHERE id = ${id};`;



  pool.getConnection((err, connention) => {
    if (err) throw err;

    connention.query(query, (err, results) => {
      if (err) throw err;
      if (results.length == 0) {
        responseAuthorNotFound(res);
        return;
      }
      responseSuccess(res, results, "Author successfully fetched");
    });
    connention.release();
  });
};

const editAuthor = (req, res) => {
  const data = {
    name: req.body.name,
    year: req.body.year,
    publisher: req.body.publisher,
    city: req.body.city,
    editor: req.body.editor,
  };
  const id = req.params.id;

  const query = `UPDATE author SET ? WHERE id = ${id};`;
  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      if (results.affectedRows == 0) {
        responseAuthorNotFound(res);
        return;
      }
      responseSuccess(res, results, "Author successfully updated");
    });
    connection.release();
  });
};

const deleteAuthor = (req, res) => {
  const id = req.params.id;

  const query = `DELETE FROM author WHERE id = ${id};`;
  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, results) => {
      if (err) throw err;

      if (results.affectedRows == 0) {
        responseAuthorNotFound(res);
        return;
      }
      responseSuccess(res, results, "Author deleted");
    });
    connection.release()
  });
};
//jika tidak di export tidak bisa digunakan

module.exports = {
  getAuthors,
  addAuthor,
  getAuthor,
  editAuthor,
  deleteAuthor,

};
