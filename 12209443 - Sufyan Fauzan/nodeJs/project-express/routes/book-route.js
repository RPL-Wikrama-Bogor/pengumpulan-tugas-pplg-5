const express = require('express');
const router = express.Router();
const bookController = require('../controller/book-controller')

router.get('/', bookController.getBooks)
router.get('/:id', bookController.getBook)
router.post('/', bookController.addBooks)
router.put('/:id', bookController.EditBook)
router.delete('/:id', bookController.DeleteBook)

module.exports = router;