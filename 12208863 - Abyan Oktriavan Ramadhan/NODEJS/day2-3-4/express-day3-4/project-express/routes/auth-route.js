const express = require("express")
const router = express.Router()
const authorController = require('../controller/auth-controller')

router.post('/register', authorController.register)
router.post('/login', authorController.login)

module.exports = router