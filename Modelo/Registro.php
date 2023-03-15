<?php

class Registro
{

    private $id;
    private $idPersona;
    private $idCurso;
    private $mensajeOperacion;

    /**Constructor */
    public function __construct()
    {
        $this->id = "";
        $this->idPersona = "";
        $this->idCurso = "";
    }

    public function setear($id, $idPersona, $idCurso)
    {
        $this->id = $id;
        $this->idPersona = $idPersona;
        $this->idCurso = $idCurso;
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

    public function getidPersona()
    {
        return $this->idPersona;
    }

    public function setidPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    public function getIdCurso()
    {
        return $this->idCurso;
    }

    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
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
        $sql = "SELECT * FROM registros WHERE id = '" . $id . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setId($row2['id']);
                    $this->setidPersona($row2['idPersona']);
                    $this->setIdCurso($row2['idCurso']);
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
        $sql = "SELECT * FROM registros WHERE id = " . $this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['idPersona'], $row['idCurso']);
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

        $sql = "INSERT INTO registros(idPersona,idCurso) VALUES(" . $this->getidPersona() . "," . $this->getIdCurso() . ");";

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
        $sql = "UPDATE registros SET idPersona='" . $this->getidPersona() . "',
        idCurso='" . $this->getIdCurso() . "',
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
        $sql = "DELETE FROM registros WHERE id=" . $this->getId();
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
        $sql = "SELECT * FROM registros ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Registro();
                    $obj->setear($row['id'], $row['idPersona'], $row['idCurso']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }
}
