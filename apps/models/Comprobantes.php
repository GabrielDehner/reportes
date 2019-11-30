<?php

class Comprobantes extends DB\SQL\Mapper{
    function __construct(\DB\SQL $db){
        parent::__construct($db, "comprobantes");
       
    }
    function save_comprobante($data){

        $sql = "INSERT INTO comprobantes (fecha,nombre,direccion, telefono, serie_equipo, tipo_equipo, marca_equipo, modelo_equipo, descripcion_falla, accesorios_equipo, entrega_dinero) 
                VALUES (:fecha,:nombre,:direccion, :telefono, :serie_equipo, :tipo_equipo, :marca_equipo, :modelo_equipo, :descripcion_falla, :accesorios_equipo, :entrega_dinero)";

        $this->db->exec(
            $sql,
            [
                ":fecha" => $data['fecha'],
                ":nombre" => $data['nombre'],
                ":direccion" => $data['direccion'],
                ":telefono" => $data['telefono'],
                ":serie_equipo" => $data['serie'],
                ":tipo_equipo" => $data['tipo_e'],
                ":marca_equipo" => $data['marca'],
                ":modelo_equipo" => $data['modelo'],
                ":descripcion_falla" => $data['falla'],
                ":accesorios_equipo" => $data['accesorios'],
                ":entrega_dinero" => $data['entrega']                
            ]
        );
        return $this->db->lastInsertId();
    }
}