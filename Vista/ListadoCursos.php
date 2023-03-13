<?php include_once('Common/header.php');
include_once('../configuracion.php');
$cursos = new C_Curso;
$arrayCursos = $cursos->buscar([]);
?>
<div class="container d-flex flex-column justify-content-center ">
    <div class="row justify-content-center d-flex m-1">
        <h1 class="col align-self-center text-center">Listado de cursos</h1>
        <div class="col align-self-center text-center">
            <button class="btn btn-primary individuales">Individuales</button>
            <button class="btn btn-primary grupales">Grupales</button>
            <button class="btn btn-primary todos">Todos</button>
        </div>
    </div>
<hr>
    <div class="container">


        <div class="cursos row justify-content-evenly g-4">
            <?php
            foreach ($arrayCursos as $curso) {
            ?>
                <div class="card col-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $curso->getNombre() ?></h5>

                        <h6 class="card-subtitle mb-2 text-muted">Modalidad: <span><?php echo ucwords(strtolower($curso->getModalidad())) ?></span></h6>
                        <p class="card-text"><?php echo $curso->getDescripcion() ?></p>
                        <p class="text-muted">Legajo: <?php echo $curso->getLegajo() ?></p>
                        <hr>

                        <form action="listarPersonasInscriptas.php" method="post">
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
</div>
<script src="Assets/Js/listadoCursos.js"></script>
<?php include_once('Common/footer.php') ?>