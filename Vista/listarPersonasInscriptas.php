<?php include_once('Common/header.php');
include_once('../configuracion.php');

$datos = data_submitted();

$objPersona = new C_Persona();
$objRegistro = new C_Registro;

//usando el id recibido busco los registros del curso
$arrayRegistros = $objRegistro->buscar(['idCurso' => $datos['idCurso']]);
//print_r($arrayRegistros);

$arrayPersonas = [];
//por cada registro busco la persona
foreach ($arrayRegistros as $registro) {
    $persona = $objPersona->buscar(['id' => $registro->getIdPersona()]);
    $arrayPersonas[] = $persona;
}

//print_r($arrayPersonas);

?>

<div class="container">

    <h1>
        Listado Personas

    </h1>
    <hr>
    <?php
    if (count($arrayPersonas) > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Razon Social</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($arrayPersonas as $persona) {

                ?>
                    <tr>
                        <th scope="row"><?php echo $persona[0]->getDni() ?></th>
                        <td><?php echo $persona[0]->getRazonSocial() ?></td>
                        <td><?php echo $persona[0]->getGenero() ?></td>
                        <td><?php echo $persona[0]->getEdad() ?></td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>

    <?php
    } else {
    ?>
        <div class="alert alert-warning" role="alert">
            No hay personas registradas. Puede registrar personas <a href="ListadoPersonas.php">aqui.</a>
        </div>
    <?php
    }
    ?>
</div>


<?php include_once('Common/footer.php') ?>