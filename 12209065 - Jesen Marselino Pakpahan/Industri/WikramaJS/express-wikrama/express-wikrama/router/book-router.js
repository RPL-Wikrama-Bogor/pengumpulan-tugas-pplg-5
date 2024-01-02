const express = require ('express');
const bookController = require('../controllers/book-controllers')

const router = express.Router();

router.get('/', bookController.getBooks);
router.get('/:id', bookController.getBook);
router.post('/', bookController.addBook);
router.put('/:id', bookController.editBook);
router.delete('/:id', bookController.deleteBook);

module.exports = router;

