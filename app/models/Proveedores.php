<?php
require_once 'Conexion.php';
class Proveedores{
    public static function ingresarProveedor($nombreProveedor,$rut){
        try {
            $conexion = new conexion();
            $sql = "INSERT INTO proveedores (nombre_provedor,rut_provedor)
            VAlUES (?,?)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1,$nombreProveedor);
            $consulta->bindParam(2,$rut);
            $consulta->execute();

        } catch (\Throwable $th) {
            
        }
    }

    public static function obtenerProveedores(){
        try {
            $conexion = new Conexion();
            $sql = "SELECT proveedor_id, nombre_provedor, rut_provedor FROM proveedores ORDER BY proveedor_id DESC";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function eliminarProveedor($proveedorId){
        try {
            $conexion = new Conexion();
            $sql = "DELETE FROM proveedores WHERE proveedor_id = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $proveedorId);
            $consulta->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}