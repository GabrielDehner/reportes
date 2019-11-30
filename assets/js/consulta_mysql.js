var consulta_mysql = {};
const mysql = require('mysql');
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "bd_fat_free_fw"
});

consulta_mysql.consultaMysql = (query_) => {
    return new Promise(function(resolve, reject){
        
        con.query(query_, function (err, result, fields) {
            if (err){ console.log(err); throw err;};
            resolve({documentos: result});
        });
        
    });
}

module.exports = consulta_mysql;