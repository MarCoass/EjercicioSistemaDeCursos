
<?php

class C_Curso
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Curso
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('id', $param)) {

            $obj = new Curso();
            $obj->setear(
                $param['id'],
                $param['nombre'],
                $param['legajo'],
                $param['descripcion'],
                $param['modalidad']
            );
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de 
     * las variables instancias del objeto que son claves
     * @param array $param
     * @return Curso
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['id'])) {
            $obj = new Curso();
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

        //Se verifica que no se repita el legajo
        $curso = ["legajo" => $param['legajo']];
        $existe = $this->buscar($curso);

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
            if (isset($param['nombre']))
                $where .= " and nombre ='" . $param['nombre'] . "'";
            if (isset($param['legajo']))
                $where .= " and legajo ='" . $param['legajo'] . "'";
            if (isset($param['descripcion']))
                $where .= " and descripcion ='" . $param['descripcion'] . "'";
            if (isset($param['modalidad']))
                $where .= " and modalidad ='" . $param['modalidad'] . "'";
        }
        $obj = new Curso();
        $arreglo =  $obj->listar($where);

        return $arreglo;
    }
}
