<?php include_once('Common/header.php');
include_once('../configuracion.php');
$cursos = new C_Curso;
$arrayCursos = $cursos->buscar([]);
?>
<link rel="stylesheet" href="Assets/Css/animacion.css">
<h1>Listado de cursos</h1>
<div>
    <button class="btn btn-primary individuales">Individuales</button>
    <button class="btn btn-primary grupales">Grupales</button>
    <button class="btn btn-primary todos">Todos</button>
</div>
<div class="container">


    <div class="cursos d-flex justify-content-evenly">
        <?php
        foreach ($arrayCursos as $curso) {
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $curso->getNombre() ?></h5>

                    <h6 class="card-subtitle mb-2 text-muted">Modalidad: <span><?php echo ucwords(strtolower($curso->getModalidad())) ?></span></h6>
                    <p class="card-text"><?php echo $curso->getDescripcion() ?></p>
                    <p class="text-muted">Legajo: <?php echo $curso->getLegajo() ?></p>
                    <hr>

                    <form action="Accion/listarPersonasInscriptas.php" method="post">
                        <input type="hidden" name="idCurso" value='<?php echo $curso->getId() ?>'>
                        <button class="btn btn-secondary" type="submit"> Ver Inscriptos </button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script src="Assets/Js/listadoCursos.js"></script>
<?php include_once('Common/footer.php') ?>