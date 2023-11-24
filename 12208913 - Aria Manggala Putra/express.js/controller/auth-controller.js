// menyediakan
const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const jwt = require("jsonwebtoken");
// createPool: menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig);
//kalau ada error, error nya dimunculkan di console
pool.on("error", (err) => {
  console.error(err);
});
//membuat format hasil API kalau htt response status code nya 400-an
const accessTokenSecret = "2023-Wikrama-exp";

const responseFailValidate = (res, message) =>
  res.status(400).json({
    success: false,
    message: message,
  });
//membuat format hasil API kalau htt response status codenya 200
const responseAuthSuccess = (res, token, message, user) =>
  res.status(200).json({
    success: true,
    token: token,
    message: message,
    user: user,
  });

const register = (req, res) => {
  if (
    ( req.body.email == null ||
      req.body.username == null ||
      req.body.password == null)
  ) {
    responseFailValidate(res, "Email/Username/Passwowrd Wajib diisi");
  }

  const data = {
    email: req.body.email,
    username: req.body.username,
    password: req.body.password,
  };

  const query = "INSERT INTO users SET ?; ";

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, [data], (err, result) => {
      if (err) throw err;

      if (result.affectedRows >= 1) {
        const token = jwt.sign(
          { email: data.email, username: data.username },
          accessTokenSecret
        );
        responseAuthSuccess(res, token, "Register Successful", {
          email: data.email,
          username: data.username,
        });
      } else {
        res.status(500).json("failed creating user");
      }
    });

    connection.release();
  });
};

const login = (req, res) => {
  if (req.body.email == null || req.body.password == null) {
    responseFailValidate(res, "Email atau Password Wajib Diisi");
  }

  const { email, password } = req.body;

  const query = `SELECT * FROM users WHERE email ='${email}' AND password ='${password}'`;

  pool.getConnection((err, connection) => {
    if (err) throw err;

    connection.query(query, (err, result) => {
      if (err) throw err;

      if (result.length >= 1) {
        const user = result.pop();

        const token = jwt.sign(
          { email: user.email, username: user.username },
          accessTokenSecret
        );

        responseAuthSuccess(res, token, "Login Success", {
          email: user.email,
          username: user.username,
        });
      } else {
        res.status(400).json({ message: "Email or Password Is Wrong" });
      }
    });
    connection.release()
  });
};

module.exports = {
    register, login
}
