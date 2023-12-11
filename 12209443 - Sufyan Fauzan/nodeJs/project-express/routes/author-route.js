const express = require('express');
const router = express.Router();
const authorController = require('../controller/author-controller')

router.get('/', authorController.getAuthors)
router.get('/:id', authorController.getAuthor)
router.post('/', authorController.addAuthors)
router.put('/:id', authorController.EditAuthor)
router.delete('/:id', authorController.DeleteAuthor)

module.exports = router;