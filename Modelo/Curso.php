<?php

class Curso
{

    private $id;
    private $nombre;
    private $descripcion;
    private $modalidad;
    private $mensajeOperacion;

    /**Constructor */
    public function __construct()
    {
        $this->id = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->modalidad = "";
    }

    public function setear($id, $nombre, $descripcion, $modalidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->modalidad = $modalidad;
    }

    /** Gets y Sets */

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getModalidad()
    {
        return $this->modalidad;
    }

    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    /**Funciones BD */

    /**BUSCAR */
    public function buscar($id)
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "SELECT * FROM cursos WHERE id = '" . $id . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setId($row2['id']);
                    $this->setNombre($row2['nombre']);
                    $this->setDescripcion($row2['descripcion']);
                    $this->setModalidad($row2['modalidad']);
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /** CARGAR **/
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM cursos WHERE id = " . $this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['nombre'], $row['descripcion'], $row['modalidad']);
                }
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /** INSERTAR **/
    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO cursos(id,nombre,descripcion,modalidad) VALUES('" . $this->getId() . "','" . $this->getNombre() . "','" . $this->getDescripcion() . "','" . $this->getModalidad() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }


    /** MODIFICAR **/
    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE cursos SET nombre='" . $this->getNombre() . "',
        descripcion='" . $this->getDescripcion() . "',
        modalidad='" . $this->getModalidad() . "',
        WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /** ELIMINAR **/
    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM cursos WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /** LISTAR **/
    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM cursos ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Curso();
                    $obj->setear($row['id'], $row['nombre'], $row['descripcion'], $row['modalidad']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }
}
