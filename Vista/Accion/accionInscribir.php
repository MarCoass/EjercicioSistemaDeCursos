<?php
include_once('../../configuracion.php');

$datos = data_submitted();

$objRegistro = new C_Registro();
$exito = $objRegistro->alta($datos);

//redirecciona al listado de cursos
exit();

if ($exito) {
?>
    <script>
        if (confirm("Persona registrada con exito. ¿Desea registrar otra?") == true) {
            window.location.href = "../ListadoPersonas.php";
        }
    </script>
<?php
    //header("Location: ../ListadoPersonas.php"); //redirecciona al listado de personas
    exit();
} else {
?>
    <script>
        if (confirm("Hubo un error al registrar la persona. ¿Desea cargar otra persona?") == true) {
            window.location.href = "../RegistrarPersona.php";
        } else {
            window.location.href = "../ListadoPersonas.php";
        }
    </script>
<?php
    //header("Location: ../RegistrarPersona.php"); //redirecciona al form
    exit();
}
