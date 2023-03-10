<?php
include_once "../../configuracion.php";

$datos = data_submitted();

$objCurso = new C_Curso();

$exito = false;


$exito = $objCurso->alta($datos);


if ($exito) {
    header("Location: ../Index.php"); //redirecciona a inicio
} else {
    echo $exito;
    //header("Location: ../RegistrarCurso.php"); //redirecciona al form
}
