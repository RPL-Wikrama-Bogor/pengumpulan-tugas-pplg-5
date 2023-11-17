const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const pool = mysql.createPool(dbConfig);

pool.on("error", (err) => {
  console.error(err);
});

const responseAuthorNotFound = (res) => {
  res.status(404).json({
    success: false,
    message: "Author Not Found",
  });
};

const responseSuccess = (res, result, message) =>
  res.status(200).json({
    success: true,
    message: message,
    data: result,
  });

const getAuthors = (req, res) => {
  const query = "SELECT * FROM author;";
  //mentambungkan ke konfigurasi db sebelumnya
  //parameter 1 : menangkap error
  //paremater 2 : mencoba koneksi ke dbnya
  pool.getConnection((err, connection) => {
    //if tanpa {} bisa digunakan ketika proses dalam if hanya satu
    //kalau pas proses awal koneksi ketemu err, kode dibawah bakal di skip dan mengembalikan hasil response err nya
    if (err) throw err;
    //menjalankan perintah sql : parameter 3
    //parameter 1 : variabel yang isinya perintah sql
    //parameter 2 : (optional) : mengirim data (hanya dijalankan untuk tambah/update data)
    //parameter 3 : function yang menangani hasil reqs sqlnya : 2 parameter (mengambil data error, mengambil data hasil)
    connection.query(query, (err, results) => {
      if (err) throw err;
      //ketika berhasil, format Api disamakan dengan function

      responseSuccess(res, results, "Authors successfully fetched");
    });
    //meberhentikan koneksi kalau query nya uda selesai dijalankan
    connection.release();
  });
};

const getAuthor = (req, res) => {
  const id = req.params.id;
  const query = `SELECT * FROM author WHERE id = ${id}`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, result) => {
      if (err) throw err;

      if (result.length == 0) {
        responseAuthorNotFound(res);
        return;
      }

      responseSuccess(res, result, "Author successfully fetched");
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
    editor: req.body.editor,
  };

  // ? : parameter yang perlu diisi
  // ? diisi sama coneection .query parameter ke 2
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

const editAuthors = (req, res) => {
  const data = {
    name: req.body.name,
    year: req.body.year,
    publisher: req.body.publisher,
    city: req.body.city,
    editor: req.body.editor,
  };

  const id = req.params.id;

  const query = `UPDATE author SET ? WHERE id = ${id}`;

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

const deleteAuthors = (req, res) => {
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
      responseSuccess(res, results, "Author successfully deleted");
    });
    connection.release();
  });
};

//kalau gak di exports gak bisa dipake   jadinya harus Wajib
module.exports = {
  getAuthors,
  addAuthor,
  getAuthor,
  editAuthors,
  deleteAuthors,
};
