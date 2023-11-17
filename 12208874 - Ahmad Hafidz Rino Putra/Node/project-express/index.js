const express = require("express");
const bookRouter = require("./routes/book-route");
const authorRouter = require("./routes/author-route");
const authRouter = require("./routes/auth-route");
const jwt = require("jsonwebtoken");
const cors = require("cors");
const accessTokenSecret = "2023-wikrama-exp";

const app = express();
app.use(express.json());
app.use(
  express.urlencoded({
    extended: true,
  })
);

app.use(cors())

const authenticateJWT = (req, res, next) => {
  const authHeader = req.headers.authorization;

  if (!authHeader) {
    return res.status(403).json({
      message: "Unauthorized",
    });
  }

  const token = authHeader.split(" ")[1];
  jwt.verify(token, accessTokenSecret, (err, user) => {
    if (err) {
      return res.status(403).json({
        message: "Unauthorized",
      });
    }
    next();
  });
};

const port = 1316;

app.use("/book", bookRouter);
app.use("/author", authorRouter);
app.use("/auth", authRouter);

app.get("/book/:id/:bookname/:year", (req, res) => {
  res.send(req.params);
});
app.get("/filter", (req, res) => {
  res.send(req.query);
});

app.listen(port, () =>
  console.log(`Server ini berjalan di http://127.0.0.1:${port}`)
);
