<?php
if(isset($_POST["ingresarProveedor"])){
    require '../models/Proveedores.php';
    $nombreProveedor = $_POST["nombre_proveedor"];
    $rut = $_POST["rut"];
    echo "$nombreProveedor,$rut";
    Proveedores::ingresarProveedor($nombreProveedor,$rut);
}

if(isset($_GET)){
    require '../models/Proveedores.php';
    $proveedorId = $_GET["proveedor"];
    Proveedores::eliminarProveedor($proveedorId);
    header("Location: ../../proveedores.php");
}