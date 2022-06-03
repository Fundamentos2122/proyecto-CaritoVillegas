<?php 

class Noticia {
    private $_id;
    private $_titulo;
    private $_descripcion;
    private $_completa;
    private $_photo;
    private $_active;

    public function __construct($id, $titulo, $descripcion, $completa, $photo, $active) {
        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setDescripcion($descripcion);
        $this->setCompleta($completa);
        $this->setPhoto($photo);
        $this->setActive($active);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getTitulo() {
        return $this->_titulo;
    }

    public function setTitulo($titulo) {
        $this->_titulo = $titulo;
    }

    public function getDescripcion() {
        return $this->_descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->_descripcion = $descripcion;
    }

    public function getCompleta() {
        return $this->_completa;
    }

    public function setCompleta($completa) {
        $this->_completa= $completa;
    }

    public function getPhoto() {
        return $this->_photo;
    }

    public function setPhoto($photo) {
        $this->_photo = base64_encode($photo);
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
        $array["titulo"] = $this->getTitulo();
        $array["descripcion"] = $this->getDescripcion();
        $array["completa"] = $this->getCompleta();
        $array["photo"] = $this->getPhoto();
        $array["active"] = $this->getActive();

        return $array;
    }
}

?>