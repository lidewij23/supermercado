<?php

require_once 'Conexion.php';

class Sexo{

    public static function obtenerSexo(){
        try {
            $conexion = new Conexion();
            $sql = "SELECT sexo_id, sexo FROM sexo";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

}