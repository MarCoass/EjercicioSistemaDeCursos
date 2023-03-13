<?php
include_once('../../configuracion.php');

$datos = data_submitted();
$objRegistro = new C_Registro();
$exito = $objRegistro->alta($datos);


    header("Location: ../ListadoPersonas.php"); //redirecciona al listado de cursos
    exit();

?>