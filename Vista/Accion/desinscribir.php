<?php
include_once('../../configuracion.php');

$datos = data_submitted();
$obj_Registro = new C_Registro();
$obj_Registro = $obj_Registro->buscar(['idPersona' => $datos['idPersona'], 'idCurso' => $datos['idCurso']]);
$exito = $obj_Registro[0]->eliminar();
