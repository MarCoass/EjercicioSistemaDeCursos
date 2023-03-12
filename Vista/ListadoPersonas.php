<?php
include_once('Common/header.php');
include_once('../configuracion.php');
$personas = new C_Persona;
$arrayPersonas = $personas->buscar([]);
$objCurso = new C_Curso();
$arrayCursos = $objCurso->buscar([]);
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
            <th scope="col">Curso Grupal</th>
            <th scope="col">Curso Individual</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        foreach ($arrayPersonas as $persona) {
            $cursos = [];
            $cIndividual = null;
                    $cGrupal = null;
            //Busco si esta registrado en algun curso 
            $objRegistro = new C_Registro();
            $arrayRegistros = $objRegistro->buscar(['idPersona' => $persona->getId()]);

            //solo si hay registros
            if (count($arrayRegistros) > 0) {
                $cursos = [];
                foreach ($arrayRegistros as $registro) {
                    $curso = '';
                    $curso = $objCurso->buscar(['id' => $registro->getIdCurso()]);
                    $cursos[] = $curso;
                    
                }
                if(count($cursos)>0){
                    $cIndividual = null;
                    $cGrupal = null;
                    foreach($cursos as $curso){
                        if($curso[0]->getModalidad()=='GRUPAL'){
                            $cGrupal = $curso;
                        } else {
                            $cIndividual = $curso;
                        }
                    }
                }
            }
            
        ?>
            <tr>
                <th scope="row"><?php echo $persona->getDni() ?></th>
                <td><?php echo $persona->getRazonSocial() ?></td>
                <td><?php echo $persona->getGenero() ?></td>
                <td><?php echo $persona->getEdad() ?></td>
                <td> <?php if($cGrupal!=null){
                    echo $cGrupal[0]->getNombre();
                } else {?> 
                <form action="Accion/accionAsignarCurso.php" method="post">
                    <input type="hidden" name="modalidad" value="GRUPAL">
                    <input type="hidden" name="idPersona" value='<?php echo $persona->getId()?>'>
                    <button type="submit" class="btn btn-primary">Asignar curso</button>
                </form>
                <?php }?></td>
                <td> <?php if($cIndividual!=null){
                    echo $cIndividual[0]->getNombre();
                } else {?> 
                    <form action="Accion/accionAsignarCurso.php" method="post">
                        <input type="hidden" name="modalidad" value="INDIVIDUAL">
                        <input type="hidden" name="idPersona" value='<?php echo $persona->getId()?>'>
                        <button type="submit" class="btn btn-primary">Asignar curso</button>
                    </form>
                    <?php }?></td>
            </tr>
        <?php
        }

        ?>

    </tbody>
</table>


<?php
include_once('Common/footer.php')
?>