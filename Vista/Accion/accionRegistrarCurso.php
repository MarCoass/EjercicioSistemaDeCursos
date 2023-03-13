<?php
include_once "../../configuracion.php";

$datos = data_submitted();

$objCurso = new C_Curso();

$exito = false;

$exito = $objCurso->alta($datos);


if ($exito) {
    header("Location: ../ListadoCursos.php"); //redirecciona al listado de cursos
    exit();
} else {
    header("Location: ../RegistrarCurso.php"); //redirecciona a inicio
    exit();
}
