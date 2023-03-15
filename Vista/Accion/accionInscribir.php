<?php
include_once('../../configuracion.php');

$datos = data_submitted();

$objRegistro = new C_Registro();
$exito = $objRegistro->alta($datos);



if ($exito) {
    $mensaje = 'Persona registrada con exito. ';
} else {
    $mensaje = 'Error al registrar persona. ';
}

?>
<script>
    alert('<?php echo $mensaje ?>');
    window.location.href = "../ListadoPersonas.php";
</script>
