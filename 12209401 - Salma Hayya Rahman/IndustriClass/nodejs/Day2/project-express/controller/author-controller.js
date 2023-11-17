//menyediaakan
const dbConfig = require("../config/db-config");
const mysql = require("mysql2");

//menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig);

pool.on("error", (err) => {
  console.error(err);
});

//membuat format hasil API kalau http response status codenya 400
const responseAuthorNotFound = (res) =>
  res.status(404).json({
    success: false,
    message: "Author Not Found",
  });

//membuat format hasil API kalau http response status codenya 200
const responseSuccess = (res, result, message) =>
  res.status(200).json({
    success: true,
    message: message,
    data: result,
  });

//mengambil semua data
const getAuthors = (req, res) => {
  const query = "SELECT * FROM author;";

  //menyambungkan konfigurasi db isinya
  //param 1 = menangkap error
  //param 2 = mencoba koneksi ke db nya
  pool.getConnection((err, connection) => {
    //if tana  {} bisa digunakan ketika proses else if nya hanya satu
    //kalau pas proses awal koneksi ketemu err, kode dibawah di skip dan mengembalikan hasil response err nya
    if (err) throw err;

    //menjalankan perintah sql
    //param 1 = variabel yang isinya perintah sql
    //param 2 = (optional) : mengirim data(hanya dijalankan untuk tambah/up)
    //param 3 = func yg menangani hasil reqs sql nya
    connection.query(query, (err, result) => {
      if (err) throw err;
      responseSuccess(res, result, "Author Successfully fetched");
    });
    //memberhentikan koneksi jika query sudah selesai dijalankan
    connection.release();
  });
};

//mengambil data sesuai id
const getAuthor = (req, res) => {
  const id = req.params.id;

  const query = `SELECT * FROM author WHERE id = ${id} ;`;

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

//menambah data
const addAuthor = (req, res) => {
  const data = {
    name: req.body.name,
    year: req.body.year,
    publisher: req.body.publisher,
    city: req.body.city,
    editor: req.body.editor,
  };

  // ? = param yang perlu diisi dan ? diisi sama connection.query param ke 2
  const query = "INSERT INTO author SET ?;";

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, [data], (err, results) => {
      if (err) throw err;

      responseSuccess(res, results, "author Successfully added");
    });
    connection.release();
  });
};

//mengedit data
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

//menghapus data
const deleteAuthor = (req, res) => {
  const id = req.params.id;
  const query = `DELETE FROM author WHERE id = ${id}`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, results) => {
      if (err) throw err;

      if (results.affectedRows == 0) {
        responseAuthorNotFound(res);
        return;
      }

      responseSuccess(res, results, "Author successfunly deleted");
    });
    connection.release();
  });
};

//jika tidak di export tidak bisa dipakai
module.exports = {
  getAuthors,
  getAuthor,
  addAuthor,
  editAuthor,
  deleteAuthor,
};
