const express = require("express");
const router = express.Router();
const authorController = require("../controller/author-controller");

router.get("/", authorController.getAuthors);
router.get("/:id", authorController.getAuthor);
router.post("/", authorController.addAuthor);
router.put("/:id", authorController.editAuthors);
router.delete("/:id", authorController.deleteAuthors);

// router.get("/", (req, res) => {
//   res.send("GET author kode");
// });
module.exports = router;


