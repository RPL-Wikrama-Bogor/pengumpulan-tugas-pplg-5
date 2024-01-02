const express = require('express')
const router = express.Router()
const authorController = require('../controller/author-controller')


router.get("/", authorController.getAuthors) 
router.get("/:id", authorController.getAuthor) 
router.post("/", authorController.addAuthor)
router.put("/:id",authorController.updateAuthor )
router.delete("/:id",authorController.deleteAuthor)

module.exports = router 