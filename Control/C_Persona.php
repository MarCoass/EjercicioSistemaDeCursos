<?php

class C_Persona
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('dni', $param)) {

            $obj = new Persona();
            $obj->setear(
                '',
                $param['dni'],
                $param['razonSocial'],
                $param['genero'],
                $param['edad']
            );
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de 
     * las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['id'])) {
            $obj = new Persona();
            $obj->cargar($param['id'], null, null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['id']))
            $resp = true;
        return $resp;
    }

    /**
     * Inserta un objeto
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $param['id'] = null;

        //Se verifica que no se repita el dni
        $usuario = ["dni" => $param['dni']];
        $existe = $this->buscar($usuario);

        if ($existe == null) {
            $obj = $this->cargarObjeto($param);
            if ($obj != null and $obj->insertar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $obj = $this->cargarObjetoConClave($param);
            if ($obj != null and $obj->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $obj = $this->cargarObjeto($param);
            if ($obj != null && $obj->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            $where .= '';
            if (isset($param['id']))
                $where .= " and id ='" . $param['id'] . "'";
            if (isset($param['dni']))
                $where .= " and dni ='" . $param['dni'] . "'";
            if (isset($param['razonSocial']))
                $where .= " and razonSocial ='" . $param['razonSocial'] . "'";
            if (isset($param['genero']))
                $where .= " and genero ='" . $param['genero'] . "'";
            if (isset($param['edad']))
                $where .= " and edad ='" . $param['edad'] . "'";
            
        }
        $obj = new Persona();
        $arreglo =  $obj->listar($where);

        return $arreglo;
    }
}
