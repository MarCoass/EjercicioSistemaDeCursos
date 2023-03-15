<?php
include_once('../../configuracion.php');

$datos = data_submitted();
$obj_Registro = new C_Registro();
$obj_Registro = $obj_Registro->buscar(['idPersona' => $datos['idPersona'], 'idCurso' => $datos['idCurso']]);
$exito = $obj_Registro[0]->eliminar();

if ($exito) {
    $mensaje = 'Se realizo la desincripcion con exito.';
} else {
    $mensaje = 'No se pudo desinscribir.';
}

?>
<script>
   

    alert('<?php echo $mensaje ?> ¿Desea cargar otro curso?');
    history.go(-1);
    

</script>