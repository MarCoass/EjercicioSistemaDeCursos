<?php
include_once('../../configuracion.php');
$datos = data_submitted();
$obj_Persona = new C_Persona();

$exito = $obj_Persona->baja(['id' => $datos['idPersona']]);
if ($exito) {
    $mensaje = 'Persona eliminada con exito. ';
} else {
    $mensaje = 'Error al eliminar persona. ';
}

?>
<script>
    alert('<?php echo $mensaje ?>');
    window.location.href = "../ListadoPersonas.php";
</script>
