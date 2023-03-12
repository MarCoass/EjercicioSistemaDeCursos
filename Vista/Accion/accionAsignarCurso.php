<?php
include_once "../../configuracion.php";
include_once('../Common/header.php');

$datos = data_submitted();
$modalidad = $datos['modalidad'];

$objCursos = new C_Curso();
$arrayCursos = $objCursos->buscar(['modalidad' => $modalidad]);

?>

<div class="container-sm mt-3 bg-dark p-4 rounded-4">
    <div class="container">
        <div class="text-center text-light">
            <h1>Inscribir en curso <?php echo strtolower($modalidad) ?></h1>
        </div>
    </div>
    <div class="offset-md-4">
        <form action="accionInscribir.php" method="post" class="col-md-6 mt-3 needs-validation" id="inscribirPersona" name="inscribirPersona" novalidate>
            <div class="">
                <div class="form-floating mt-3">
                    <select class ="form-select" name="idCurso" id="idCurso">
                        <?php
                        foreach ($arrayCursos as $curso) {
                        ?>
                        <option value='<?php echo $curso->getId() ?>'> <?php echo $curso->getNombre() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="Curso">Seleccionar curso</label>
                </div>
            </div>
                        <input type="hidden" name="idPersona" value='<?php echo $datos['idPersona']?>'>
            <div class="mt-3 mb-3">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Cargar</button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>

<?php
include_once('../Common/footer.php'); ?>