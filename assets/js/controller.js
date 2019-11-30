const respuesta = {};

respuesta.getRespuesta = async (req, res)=> {
    
    res.json({mensaje:req.params.id_n});
};

module.exports = respuesta;