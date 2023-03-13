<?php include 'Common/header.php' ?>
<div class="container">
    <h2>Ejercicio Cursos de Capacitacion</h2>
    <p>
        Se debe realizar una peticion a un endpoint el cual le otorgara informacion sobre 100 personas en una BD.<br>

        Una vez obtenidos los datos, se necesita que realice las siguientes tareas.
    <ul style=" list-style-type: none">
        <li>
            Crear un CRUD o ABM web que permita inscribir personas a cursos de capacitacion, con las siguientes restricciones
            y requerimientos.
        </li>
        <li>
            Para las personas se pide registrar su nombre, apellido, DNI, genero y edad. No puede haber personas duplicadas en
            el sistema.
        </li>
        <li>
            De los cursos se sabe que poseen un legajo, un nombre que le permite a un usuario poder reconocerlo,
            una descripcion que permite conocer el detalle del mismo y su modalidad, la cual puede ser grupal o individual.
        </li>
        <li>

            Un curso no puede contener 2 modalidades diferentes, es decir, es grupal o individual.
            Tampoco puede haber cursos duplicados.
        </li>
        <li>
            Una persona se puede inscribir a 1 solo curso por modalidad.
        </li>
        <li>

            Emitir un reporte por pantalla de personas por curso.
        </li>
        <li>
            Listar por separado los cursos individuales y grupales, mostrar los nombres de los usuarios en orden de la lista
            creada, a un costado de la misma, solo que el nombre que se muestra debe estar en grande, cambiar cada 10-15 segundos
            (si es posible animar tanto cuando desaparece el nombre como cuando aparece el proximo) y debe corresponder con el nombre en la lista.
        </li>
        <li>
            Obtener cantidad de mujeres y hombres
        </li>
        <li>
            Obtener cantidad de menores y mayores de edad.
        </li>
    </ul>
</div>
</p>
<?php include 'Common/footer.php' ?>