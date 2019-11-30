// var dnode = require('dnode');
// var port = process.argv[2] || 8081;
// dnode({
//   echo: function (data, callback) {
//     data='datos';
//     callback(null, data);
//   }
// }).listen(port);
const express = require('express');
const morgan = require('morgan');
const cors = require('cors');
const app = express();


//configuraciones
app.set('port', process.env.PORT || 3000);

//Funciones para procesar datos-Middleware
app.set(morgan('dev'));
app.use(express.json());
app.use(cors({origin:'http://localhost'}));

//Rutas
app.use('/api',require('./routes/routes'));

////Escucha
app.listen(app.get('port'),()=>{
    console.log('Server corriendo en puerto '+app.get('port'));
});
