<?php
include_once('../../configuracion.php');

$datos = data_submitted();
$objRegistro = new C_Registro();
$exito = $objRegistro->alta($datos);

if($exito){
    echo 'Registrado';
} else {
    echo 'Error';
}