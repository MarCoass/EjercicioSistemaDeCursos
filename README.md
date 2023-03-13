# EjercicioSistemaDeCursos

## Requisitos
PHP 8.1.13
MySQL 8.0.31

## Como correr el proyecto
- Descargar y copiar la carpeta en xampp/htdocs o wampp/www segun sea necesario
- Crear una base de datos llamada 'ejercicio_sistemas_cursos' e importar el archivo ejercicio_sistemas_cursos.sql. 
En la base de datos se encuentran cargados cursos, para cargar personas se puede acceder a las opciones 'Registrar Persona' (para carga manual) o 'Cargar desde Endpoint' (para cargar automaticamente 100 personas).

## Enunciado
Se debe realizar una peticion a un endpoint el cual le otorgara informacion sobre 100 personas en una BD.
Una vez obtenidos los datos, se necesita que realice las siguientes tareas.
Crear un CRUD o ABM web qu permita inscribir personas a cursos de capacitacion, con las siguientes restricciones 
y requerimientos.
Para las personas se pide registrar su nombre, apellido, DNI, genero y edad. No puede haber personas duplicadas en
el sistema.
De los cursos se sabe que poseen un legajo, un nombre que le permite a un usuario poder reconocerlo,
una descripcion que permite conocer el detalle del mismo y su modalidad, la cual puede ser grupal o individual.
Un curso no puede contener 2 modalidades diferentes, es decir, es grupal o individual. 
Tampoco puede haber cursos duplicados.
Una persona se puede inscribir a 1 solo curso por modalidad.
Emitir un reporte por pantalla de personas por curso.
Listar por separado los cursos individuales y grupales, mostrar los nombres de los usuarios en orden de la lista 
creada, a un costado de la misma, solo que el nombre que se muestra debe estar en grande, cambiar cada 10-15 segundos
(si es posible animar tanto cuando desaparece el nombre como cuando aparece el proximo) y debe corresponder con el nombre en la lista.
Obtener cantidad de mujeres y hombres
Obtener cantidad de menores y mayores de edad.

