<?php 

class User {
    private $_id;
    private $_nombres;
    private $_apellidos;
    private $_edad;
    private $_direccion;
    private $_celular;
    private $_correo;
    private $_password;
    private $_photo;
    private $_type;
    private $_username;

    public function __construct($id, $nombres, $apellidos, $edad, $direccion, $celular,  $correo, $password, $photo, $type, $username) {
        $this->setId($id);
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
        $this->setEdad($edad);
        $this->setDireccion($direccion);
        $this->setCelular($celular);
        $this->setCorreo($correo);
        $this->setPassword($password);
        $this->setPhoto($photo);
        $this->setType($type);
        $this->setUsername($username);
        $this->setType($type);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getNombres() {
        return $this->_nombres;
    }

    public function setNombres($nombres) {
        $this->_nombres = $nombres;
    }

    public function getApellidos() {
        return $this->_apellidos;
    }

    public function setApellidos($apellidos) {
        $this->_apellidos = $apellidos;
    }

    public function getEdad() {
        return $this->_edad;
    }

    public function setEdad($edad) {
        $this->_edad = $edad;
    }

    public function getDireccion() {
        return $this->_direccion;
    }

    public function setDireccion($direccion) {
        $this->_direccion = $direccion;
    }

    public function getCelular() {
        return $this->_celular;
    }

    public function setCelular($celular) {
        $this->_celular = $celular;
    }

    public function getCorreo() {
        return $this->_correo;
    }

    public function setCorreo($correo) {
        $this->_correo = $correo;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

    public function getPhoto() {
        return $this->_photo;
    }

    public function setPhoto($photo) {
        $this->_photo = base64_encode($photo);
    }

    public function getType() {
        return $this->_type;
    }

    public function setType($type) {
        $this->_type = $type;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function setUsername($username) {
        $this->_username = $username;
    }


    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["nombres"] = $this->getNombres();
        $array["apellidos"] = $this->getApellidos();
        $array["edad"] = $this->getEdad();
        $array["direccion"] = $this->getDireccion();
        $array["celular"] = $this->getCelular();
        $array["correo"] = $this->getCorreo();
        $array["username"] = $this->getUsername();
        $array["photo"] = $this->getPhoto();
        $array["type"] = $this->getType();

        return $array;
    }
}

?>