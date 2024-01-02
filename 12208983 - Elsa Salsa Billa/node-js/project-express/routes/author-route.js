const express = require('express')
const router = express.Router() // agar bisa menggunakan router yg dibawah
const authorController = require('../controller/author-controller')

router.get("/", authorController.getAuthors)
router.get("/:id", authorController.getAuthor)
router.post("/", authorController.addAuthor)
router.put('/:id', authorController.editAuthor)
router.delete('/:id', authorController.deleteAuthor)

module.exports = router