<?php

class Persona
{

    private $dni;
    private $razonSocial;
    private $genero;
    private $edad;
    private $mensajeOperacion;

    /**Constructor */
    public function __construct()
    {
        $this->dni = "";
        $this->razonSocial = "";
        $this->genero = "";
        $this->edad = "";
    }

    public function setear($dni, $razonSocial, $genero, $edad)
    {
        $this->dni = $dni;
        $this->razonSocial = $razonSocial;
        $this->genero = $genero;
        $this->edad = $edad;
    }

    /** Gets y Sets */

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
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
    public function buscar($dni)
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "SELECT * FROM personas WHERE idusuario = '" . $dni . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setDni($row2['dni']);
                    $this->setRazonSocial($row2['razonSocial']);
                    $this->setGenero($row2['genero']);
                    $this->setEdad($row2['edad']);
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
        $sql = "SELECT * FROM personas WHERE dni = " . $this->getDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['dni'], $row['razonSocial'], $row['genero'], $row['edad']);
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
        $sql = "INSERT INTO personas(dni,razonSocial,genero,edad) VALUES('" . $this->getDni() . "','" . $this->getRazonSocial() . "','" . $this->getGenero() . "','" . $this->getEdad() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setDni($elid);
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
        $sql = "UPDATE personas SET razonSocial='" . $this->getRazonSocial() . "',
        genero='" . $this->getGenero() . "',
        edad='" . $this->getEdad() . "',
        WHERE dni=" . $this->getDni();
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
        $sql = "DELETE FROM personas WHERE dni=" . $this->getDni();
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
        $sql = "SELECT * FROM personas ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Persona();
                    $obj->setear($row['dni'], $row['razonSocial'], $row['genero'], $row['edad']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }
}
