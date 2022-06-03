<?php 

class Gato {
    private $_id;
    private $_nombre;
    private $_edad;
    private $_descripcion;
    private $_photo;
    private $_adoptado;
    private $_active;

    public function __construct($id, $nombre, $edad, $descripcion,  $photo, $adoptado, $active) {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setEdad($edad);
        $this->setDescripcion($descripcion);
        $this->setPhoto($photo);
        $this->setAdoptado($adoptado);
        $this->setActive($active);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getNombre() {
        return $this->_nombre;
    }

    public function setNombre($nombre) {
        $this->_nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->_descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->_descripcion = $descripcion;
    }

    public function getEdad() {
        return $this->_edad;
    }

    public function setEdad($edad) {
        $this->_edad= $edad;
    }

    public function getPhoto() {
        return $this->_photo;
    }

    public function setPhoto($photo) {
        $this->_photo = base64_encode($photo);
    }

    public function getAdoptado() {
        return $this->_adoptado;
    }

    public function setAdoptado($adoptado) {
        $this->_adoptado= $adoptado;
    }

    public function getActive() {
        return $this->_active;
    }

    public function setActive($active) {
        $this->_active= $active;
    }


    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["nombre"] = $this->getNombre();
        $array["edad"] = $this->getEdad();
        $array["descripcion"] = $this->getDescripcion();
        $array["photo"] = $this->getPhoto();
        $array["adoptado"] = $this->getAdoptado();
        $array["active"] = $this->getActive();

        return $array;
    }
}

?>