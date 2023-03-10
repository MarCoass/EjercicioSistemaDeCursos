<?php
include_once('Common/header.php');
include_once('../configuracion.php');
$personas = new C_Persona;
$arrayPersonas = $personas->buscar([]);
//print_r($arrayPersonas);
?>
<h1>
    Listado Personas
</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">DNI</th>
            <th scope="col">Razon Social</th>
            <th scope="col">Genero</th>
            <th scope="col">Edad</th>
            <th scope="col">Curso Individual</th>
            <th scope="col">Curso Grupal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayPersonas as $persona) {
        ?>
            <tr>
                <th scope="row"><?php echo $persona->getDni() ?></th>
                <td><?php echo $persona->getRazonSocial() ?></td>
                <td><?php echo $persona->getGenero() ?></td>
                <td><?php echo $persona->getEdad() ?></td>
                <td>Curso Grupal</td>
                <td>Curso Individual</td>
            </tr>
        <?php
        }

        ?>

    </tbody>
</table>


<?php
include_once('Common/footer.php')
?>