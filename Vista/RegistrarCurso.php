<?php
include_once '../configuracion.php';
$datos = data_submitted();

include_once 'Common/header.php';

?>

<div class="container-sm mt-3 bg-dark p-4 rounded-4">
    <div class="container">
        <div class="text-center text-light">
            <h1>Registrar Curso</h1>
        </div>
    </div>
    <div class="offset-md-4">
        <form action="Accion/accionRegistrarCurso" method="post" class="col-md-6 mt-3 needs-validation" id="registrarCurso" name="registrarCurso" novalidate>
            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" minlength="3" maxlength="50" required>
                    <label for="nombre">Nombre</label>
                    <div class="invalid-feedback">
                        Ingrese un nombre valido.
                    </div>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="legajo" name="legajo" type="text" placeholder="legajo" minlength="3" maxlength="50" required>
                    <label for="legajo">Legajo</label>
                    <div class="invalid-feedback">
                        Ingresar un legajo valido.
                    </div>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="descripcion" name="descripcion" type="text" placeholder="Descripcion" required>
                    <label for="descripcion">Descripcion</label>
                    <div class="invalid-feedback">
                        Ingrese un descripcion valida.
                    </div>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <select class="form-select" name="modalidad" id="modalidad" required>
                        <option value="" selected disabled>Modalidad</option>
                        <option value="GRUPAL">Grupal</option>
                        <option value="INDIVIDUAL">Individual</option>
                    </select>
                    <label for="modalidad">Modalidad</label>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Cargar</button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<script src="Assets/Js/validarFormulario.js"></script>
<?php


include_once 'Common/footer.php';

?>