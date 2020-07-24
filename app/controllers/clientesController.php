<?php

if (isset($_POST["registrar"])) {
    require '../models/Clientes.php';
    $nombreCompleto = $_POST["nombre_completo"];
    $rut = $_POST["rut"]; 
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $password = $_POST["password"];
    echo "$nombreCompleto, $rut,
    $fechaNacimiento, $direccion, $telefono, $sexo, $password";
    Clientes::ingresarCliente($nombreCompleto, $rut,
    $fechaNacimiento, $direccion, $telefono, $sexo, $password);

}

if (isset($_POST["loguear"])) {
    session_start();
    require '../models/Clientes.php';
    $rut = $_POST["rut"];
    $password = $_POST["password"];
    $result = Clientes::obtenerClientePorRut($rut);
    if ($result != null) {
        if ($password == $result->password) {
            $_SESSION["rut"] = $rut;
            header("Location: ../../shop-grid.php");
        }else{
            echo "contraseña incorrecta";
        }
    }else{
        echo "rut no existe";
    }
}