<?php 

class Solicitudes {
    private $_id;
    private $_id_gato;
    private $_id_user;
    private $_fecha;
    private $_aceptada;

    public function __construct($id, $id_gato, $id_user, $fecha,  $aceptada) {
        $this->setId($id);
        $this->setIdGato($id_gato);
        $this->setIdUser($id_user);
        $this->setFecha($fecha);
        $this->setAceptada($aceptada);
    }

    public function getId() {
        return $this->_id;
    }
    

    public function setId($id) {
        $this->_id = $id;
    }

    public function getIdGato() {
        return $this->_id_gato;
    }

    public function setIdGato($id_gato) {
        $this->_id_gato = $id_gato;
    }

    public function getIdUser() {
        return $this->_id_user;
    }

    public function setIdUser($id_user) {
        $this->_id_user = $id_user;
    }


    public function getFecha() {
        return $this->_fecha;
    }

    public function setFecha($fecha) {
        $this->_fecha= $fecha;
    }

    public function getAceptada() {
        return $this->_aceptada;
    }

    public function setAceptada($aceptada) {
        $this->_aceptada= $aceptada;
    }


    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["id_gato"] = $this->getIdGato();
        $array["id_user"] = $this->getIdUser();
        $array["fecha"] = $this->getFecha();
        $array["aceptada"] = $this->getAceptada();

        return $array;
    }
}

?>