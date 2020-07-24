<?php
if(isset($_POST["ingresarProducto"])){
    require '../models/Productos.php';
    $nombreProducto = $_POST["nombre_producto"];
    $precio = $_POST["precio"];
    $stockMaximo = $_POST["stockMaximo"];
    $stockMinimo = $_POST["stockMinimo"];
    $file_name = $_FILES["imagen"]["name"];
    $file_tmp = $_FILES["imagen"]["tmp_name"];
    move_uploaded_file($file_tmp,"../../img/". $file_name);
    Productos::ingresarProductos($nombreProducto,$precio,$stockMaximo,$stockMinimo, $file_name);
    header("Location: ../../gestion-productos.php");
}

if(isset($_GET["borrarProducto"])){
    require '../models/Productos.php';
    $productoId = $_GET["producto"];
    Productos::eliminarProducto($productoId);
    header("Location: ../../gestion-productos.php");
}

if(isset($_POST["editarProducto"])){
    require '../models/Productos.php';
    $nombreProducto = $_POST["nombre_producto"];
    $precio = $_POST["precio"];
    $stockMaximo = $_POST["stockMaximo"];
    $stockMinimo = $_POST["stockMinimo"];
    $productoId = $_POST["producto"];

    Productos::editarProducto($nombreProducto, $precio, $stockMaximo, $stockMinimo, $productoId);
    header("Location: ../../editar-producto.php?producto=".$productoId);
}