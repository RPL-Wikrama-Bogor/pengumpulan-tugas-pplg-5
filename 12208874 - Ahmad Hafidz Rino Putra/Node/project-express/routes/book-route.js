const express = require('express')
const router = express.Router()
const bookController = require('../controller/book-controller')


router.get("/", bookController.getBooks) 
router.get("/:id", bookController.getBook) 
router.post("/", bookController.addBook)
router.put("/:id",bookController.updateBook )
router.delete("/:id",bookController.deleteBook)

module.exports = router 