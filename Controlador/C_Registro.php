
<?php

class C_Registro{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Registro
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('id', $param)) {

            $obj = new Registro();
            $obj->setear(
                $param['id'],
                $param['dniPersona'],
                $param['idCurso']
            );
        }
        return $obj;
    }

     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los dniPersonas de 
     * las variables instancias del objeto que son claves
     * @param array $param
     * @return Registro
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['id'])) {
            $obj = new Registro();
            $obj->cargar($param['id'], null, null);
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
        $obj = $this->cargarObjeto($param);
        if ($obj != null and $obj->insertar()) {
            $resp = true;
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
            if (isset($param['dniPersona']))
                $where .= " and dniPersona ='" . $param['dniPersona'] . "'";
            if (isset($param['idCurso']))
                $where .= " and idCurso ='" . $param['idCurso'] . "'";
            
            
        }
        $obj = new Registro();
        $arreglo =  $obj->listar($where);

        return $arreglo;
    }

}