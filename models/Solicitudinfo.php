<?php 

class Solicitudinfo {
    private $_id;
    private $_fecha;
    private $_nombre;
    private $_nombres;

    public function __construct($id,$fecha,$nombre,$nombres) {
        $this->setId($id);
        $this->setFecha($fecha);
        $this->setNombre($nombre);
        $this->setNombres($nombres);
    }
    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getFecha() {
        return $this->_fecha;
    }

    public function setFecha($fecha) {
        $this->_fecha= $fecha;
    }

    public function getNombre() {
        return $this->_nombre;
    }

    public function setNombre($nombre) {
        $this->_nombre= $nombre;
    }

    public function getNombres() {
        return $this->_nombres;
    }

    public function setNombres($nombres) {
        $this->_nombres= $nombres;
    }


    public function getArray() {
        $array = array();
        $array["id"] = $this->getId();
        $array["nombre"] = $this->getNombre();
        $array["nombres"] = $this->getNombres();
        $array["fecha"] = $this->getFecha();

        return $array;
    }
}

?>