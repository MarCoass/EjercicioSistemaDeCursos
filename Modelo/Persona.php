<?php
class Persona
{
    private $id;
    private $dni;
    private $razonSocial;
    private $genero;
    private $edad;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->id = "";
        $this->dni = "";
        $this->razonSocial = "";
        $this->genero = "";
        $this->edad = "";
        $this->mensajeOperacion = "";
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }

    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
        return $this;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
        return $this;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
        return $this;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function setear($id, $dni, $razonSocial, $genero, $edad)
    {
        $this->setId($id);
        $this->setDni($dni);
        $this->setRazonSocial($razonSocial);
        $this->setGenero($genero);
        $this->setEdad($edad);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM personas WHERE id=" . $this->getId();

        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['dni'], $row['razonSocial'], $row['genero'], $row['edad']);
                }
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }

        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO personas (dni, razonsocial, genero, edad) VALUES ('" . $this->getDni() . "','" . $this->getRazonSocial() . "','" . $this->getGenero() . "','" . $this->getEdad() . "');";

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

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE personas SET dni= '" . $this->getDni() . "', razonsocial= '" . $this->getRazonSocial() . "', genero= '" . $this->getGenero() . "', edad= '" . $this->getEdad() . "' WHERE id=" . $this->getId();

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

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM personas WHERE id= " . $this->getId();


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

    public static function listar($condicion = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM personas ";

        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }

        $res = $base->Ejecutar($sql);

        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Persona();
                    $obj->setear($row['id'], $row['dni'], $row['razonSocial'], $row['genero'], $row['edad']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }

        return $arreglo;
    }
}
