<?php
include_once '../configuracion.php';
$datos = data_submitted();

include_once 'Common/header.php';

?>

<div class="container-sm mt-3 bg-dark p-4 rounded-4">
    <div class="container">
        <div class="text-center text-light">
            <h1>Registrar persona</h1>
        </div>
    </div>
    <div class="offset-md-4">
        <form action="Accion/accionRegistrarPersona.php" method="post" class="col-md-6 mt-3 needs-validation" id="registrarPersona" name="registrarPersona" novalidate>
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
                    <input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido" minlength="3" maxlength="50" required>
                    <label for="apellido">Apellido</label>
                    <div class="invalid-feedback">
                        Ingresar un apellido valido.
                    </div>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="dni" name="dni" type="text" placeholder="DNI" pattern="[0-9]{8}" required>
                    <label for="dni">DNI</label>
                    <div class="invalid-feedback">
                        Ingrese un DNI valido.
                    </div>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <select class="form-select" name="genero" id="genero" required>
                        <option value="" selected disabled>Seleccione su genero</option>
                        <option value="FEMENINO">Femenino</option>
                        <option value="MASCULINO">Maculino</option>
                        <option value="OTRO">Otro</option>
                    </select>
                    <label for="genero">Género</label>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="nacimiento" name="nacimiento" type="date" placeholder="dd/mm/aaaa" required>
                    <label for="nacimiento">Nacimiento</label>
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