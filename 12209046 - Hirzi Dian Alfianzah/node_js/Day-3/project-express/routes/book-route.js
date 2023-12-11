const express = require("express");
const router = express.Router();
const bookController = require("../controller/book-controller");

router.get("/", bookController.getBooks);
router.post("/", bookController.addBook);
router.get("/:id", bookController.getBook);

// router.get("/", (req, res) => {
//   res.send("GET book kode");
// });

router.post("/", (req, res) => {
  res.send("POST book kode");
});

router.put("/", (req, res) => {
  res.send("PUT book kode");
});

router.delete("/", (req, res) => {
  res.send("DELETE book kode");
});

module.exports = router;
