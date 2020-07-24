<?php 
if(isset($_POST["ingresarFamilia"])){
    require '../models/Familias.php';
    $nombreFamilia = $_POST["nombre"];
    echo "$nombreFamilia";
    Familias::ingresarFamilia($nombreFamilia);

}
if(isset($_GET)){
    require '../models/Familias.php';
    $familiasId = $_GET["familia"];
    Familias::eliminarFamilia($familiasId);
    header("Location:../../gestion-familias.php");
}