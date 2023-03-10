<?php
include_once "../../configuracion.php";

$datos = data_submitted();


$razonSocial = strtoupper($datos['apellido'] . ", " . $datos['nombre']);
$datos['razonSocial'] = $razonSocial;

$nacimiento = $datos['nacimiento'];
$edad = date_diff(date_create($nacimiento), date_create( date("Y-m-d")));
$datos['edad'] = $edad->format('%y'); //date interval a años

$abmUsuario = new C_Persona();

$exito = false;


$exito = $abmUsuario->alta($datos);


if ($exito) {
    header("Location: ../Index.php");
} else {
    header("Location: ../RegistrarPersona.php");
}