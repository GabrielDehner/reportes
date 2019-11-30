const express = require('express');
const router = express.Router();
const respuesta = require('../controller');

//Api rest en json
router.get('/:id_n', respuesta.getRespuesta);//obtener



module.exports = router;