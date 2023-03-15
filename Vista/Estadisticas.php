<?php include_once('Common/header.php');
include_once('../configuracion.php');
include_once('../Control/C_Persona.php');

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

$objCurso = new C_Curso();
?>
<div class="container w-50 d-flex flex-column justify-content-center ">
    <h2>Estadisticas</h2>
    <p class="fs-4">
        Total personas registradas: <?php
                                    $arrayPersonas = $objPersona->buscar([]);
                                    echo count($arrayPersonas);
                                    ?>
    </p>

    <div>
        <h5>Por genero</h5>

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
    <div>
        <h5>Por edad</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Menores de edad: <?php
                                                            echo $cantMenores;
                                                            ?></li>
            <li class="list-group-item">Mayores de edad: <?php echo $cantMayores;
                                                            ?></li>
        </ul>
    </div>

    <p class="fs-4">
        Total cursos registrados: <?php
                                    $arrayCursos = $objCurso->buscar([]);
                                    echo count($arrayCursos);
                                    ?>
    </p>

    <div>
        <h5>Por modalidad</h5>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Grupales: <?php
                                                    $arrayCursos = $objCurso->buscar(['modalidad' => 'GRUPAL']);
                                                    echo count($arrayCursos);
                                                    ?></li>
            <li class="list-group-item">Individuales: <?php
                                                        $arrayCursos = $objCurso->buscar(['modalidad' => 'INDIVIDUAL']);
                                                        echo count($arrayCursos);
                                                        ?></li>

        </ul>
    </div>

</div>

</div>
<?php include_once('Common/footer.php') ?>