<?php
include_once('../../configuracion.php');
$datos = data_submitted();
$obj_Persona = new C_Persona();

$exito = $obj_Persona->baja(['id' => $datos['idPersona']]);
