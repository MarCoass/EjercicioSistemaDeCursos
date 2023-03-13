<?php include ('../../configuracion.php');

$url = 'https://weblogin.muninqn.gov.ar/api/Examen';
$data = file_get_contents($url);

$datos = json_decode($data, true)['value'];
//var_dump($datos);

foreach($datos as $persona){
$nacimiento = $persona['fechaNacimiento'];
$edad = date_diff(date_create($nacimiento), date_create( date("Y-m-d")));
$persona['edad'] = $edad->format('%y');

$genero = $persona['genero']['value'];
$persona['genero'] = $genero;

$objPersona = new C_Persona();
$objPersona->alta($persona);

header("Location: ../ListadoPersonas.php"); //redirecciona al listado de personas
}


