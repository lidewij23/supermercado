<?php

require_once 'Conexion.php';

class Familias{

    public static function ingresarFamilia($nombreFamilia){
        try {
            $conexion = new Conexion();
            $sql = "INSERT INTO familias (nombre) 
            VALUES(?)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $nombreFamilia);
            $consulta->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public static function obtenerFamilias(){
        try {
            $conexion = new Conexion();
            $sql = "SELECT familia_id, nombre FROM familias";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public static function eliminarFamilia($familiaId){
        try {
            $conexion = new Conexion();
            $sql = "DELETE FROM familias WHERE familia_id = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $familiaId);
            $consulta->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}