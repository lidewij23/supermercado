<?php

require_once 'Conexion.php';

class Productos {

    public static function ingresarProductos($producto,$precio,$stockMaximo,$stockMinimo, $imgUrl){
        try {
            $conexion = new Conexion();
            $sql = "INSERT INTO productos (nombre_producto,precio,stock_maximo,stock_minimo, img_url) 
            VALUES(?,?,?,?,?)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $producto);
            $consulta->bindParam(2, $precio);
            $consulta->bindParam(3, $stockMaximo);
            $consulta->bindParam(4, $stockMinimo);
            $consulta->bindParam(5, $imgUrl);
            $consulta->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public static function obtenerProducto(){
        try {
            $conexion = new Conexion();
            $sql = "SELECT producto_id, nombre_producto, precio, stock_maximo, stock_minimo, img_url FROM productos
            ORDER BY producto_id DESC";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $response = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function obtenerProductoPorId($productoId){
        try {
            $conexion = new Conexion();
            $sql = "SELECT producto_id, nombre_producto, precio, stock_maximo, stock_minimo FROM productos WHERE producto_id = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $productoId);
            $consulta->execute();
            $response = $consulta->fetch(PDO::FETCH_OBJ);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public static function eliminarProducto($productoId){
        try {
            $conexion = new Conexion();
            $sql = "DELETE FROM productos WHERE producto_id = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $productoId);
            $consulta->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function editarProducto($nombreProducto, $precio, $stockMaximo, $stockMinimo, $productoId){
        try {
            $conexion = new Conexion();
            $sql = "UPDATE productos SET nombre_producto = ?, precio = ?, stock_maximo = ?, stock_minimo = ? WHERE producto_id = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $nombreProducto);
            $consulta->bindParam(2, $precio);
            $consulta->bindParam(3, $stockMaximo);
            $consulta->bindParam(4, $stockMinimo);
            $consulta->bindParam(5, $productoId);
            $consulta->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}