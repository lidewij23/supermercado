<?php

require_once 'Conexion.php';

class Clientes{

    public static function ingresarCliente($nombreCompleto, $rut,
    $fechaNacimiento, $direccion, $telefono, $sexo, $password){
        try {
            $conexion = new Conexion();
            $sql = "INSERT INTO clientes (nombre_cliente, rut, fecha_nacimiento, direccion, telefono, sexo_id, password)
            VALUES(?,?,?,?,?,?,?)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $nombreCompleto);
            $consulta->bindParam(2, $rut);
            $consulta->bindParam(3, $fechaNacimiento);
            $consulta->bindParam(4, $direccion);
            $consulta->bindParam(5, $telefono);
            $consulta->bindParam(6, $sexo);
            $consulta->bindParam(7, $password);
            $consulta->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function obtenerClientePorRut($rut){
        try {
            $conexion = new Conexion();
            $sql = "SELECT nombre_cliente, rut, fecha_nacimiento, direccion, telefono, sexo_id, password FROM clientes WHERE rut = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $rut);
            $consulta->execute();
            $response = $consulta->fetch(PDO::FETCH_OBJ);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}