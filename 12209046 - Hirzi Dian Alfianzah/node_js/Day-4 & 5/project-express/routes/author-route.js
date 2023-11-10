const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
  res.send("GET author kode");
});

router.post("/", (req, res) => {
  res.send("POST author kode");
});

router.put("/", (req, res) => {
  res.send("PUT author kode");
});

router.delete("/", (req, res) => {
  res.send("DELETE author kode");
});

module.exports = router;
