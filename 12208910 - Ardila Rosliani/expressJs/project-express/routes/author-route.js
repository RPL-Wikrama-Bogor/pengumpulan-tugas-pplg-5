const express = require("express") // import express
const router = express.Router()
const authorController = require('../controller/author-controller')

//arrow function

router.get('/', authorController.getAuthors)
router.get('/:id', authorController.getAuthor)
router.post('/', authorController.addAuthor)
router.put('/:id', authorController.editAuthor)
router.delete('/:id', authorController.deleteAuthor)


module.exports = router