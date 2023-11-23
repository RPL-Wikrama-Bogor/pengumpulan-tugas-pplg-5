const express = require('express');
const penulisController = require('../controllers/penulis-controllers')

const router = express.Router();

router.get('/', penulisController.getpenulis);
router.get('/:id', penulisController.getpenulisid);
router.put('/:id', penulisController.editpenulis);
router.post('/', penulisController.addpenulis);
router.delete('/:id', penulisController.deletepenulis);

module.exports = router;
