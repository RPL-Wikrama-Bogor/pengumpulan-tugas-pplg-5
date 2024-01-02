const express = require("express")
const router = express.Router()
const AuthorController = require('../controller/author-controller')

router.get('/', AuthorController.getAuthors)
router.get('/:id', AuthorController.getAuthor)
router.post('/', AuthorController.addAuthor)
router.put('/:id', AuthorController.editAuthor)
router.delete('/:id', AuthorController.deleteAuthor)

module.exports = router