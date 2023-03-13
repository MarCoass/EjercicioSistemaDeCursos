<?php include_once('Common/header.php');
include_once('../configuracion.php');

$objPersona = new C_Persona();
$arrayPersonas = $objPersona->buscar([]);
$cantMenores = 0;
$cantMayores = 0;
foreach ($arrayPersonas as $persona) {
    if ($persona->getEdad() < 18) {
        $cantMenores++;
    } else {
        $cantMayores++;
    }
}
?>
<div class="container center">
    <h2>Estadisticas</h2>
    Total personas registradas: <?php
                                $arrayPersonas = $objPersona->buscar([]);
                                echo count($arrayPersonas);
                                ?>
    <div class="d-flex justify-content-evenly">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                <h5>Por genero</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Femenino: <?php
                                                        $arrayPersonas = $objPersona->buscar(['genero' => 'FEMENINO']);
                                                        echo count($arrayPersonas);
                                                        ?></li>
                <li class="list-group-item">Masculino: <?php
                                                        $arrayPersonas = $objPersona->buscar(['genero' => 'MASCULINO']);
                                                        echo count($arrayPersonas);
                                                        ?></li>
                <li class="list-group-item">Otro: <?php
                                                    $arrayPersonas = $objPersona->buscar(['genero' => 'OTRO']);
                                                    echo count($arrayPersonas);
                                                    ?></li>
            </ul>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                <h5>Por edad</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Menores de edad: <?php
                                                                echo $cantMenores;
                                                                ?></li>
                <li class="list-group-item">Mayores de edad: <?php echo $cantMayores;
                                                                ?></li>
            </ul>
        </div>
    </div>

</div>
<?php include_once('Common/footer.php') ?>