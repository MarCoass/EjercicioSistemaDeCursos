<?php
include_once "../../configuracion.php";

$datos = data_submitted();

$objCurso = new C_Curso();

$exito = false;

$exito = $objCurso->alta($datos);


if ($exito) {
    $mensaje = 'Curso cargado con exito. ';
} else {
    $mensaje = 'Error al cargar el curso. ';
}

?>
<script>
    if (confirm("<?php echo $mensaje ?> ¿Desea cargar otro curso?") == true) {
        window.location.href = "../RegistrarCurso.php";
    } else {
        window.location.href = "../ListadoCursos.php";
    }
</script>