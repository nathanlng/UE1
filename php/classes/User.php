<?php
class User {
    private $id;
    private $login;
    private $password;
    private $typeOf;
    private $joueur;
    private $recruteur;

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($value){
        $this->login = $value;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($value){
        $this->password = $value;
    }

    public function getTypeOf(){
        return $this->typeOf;
    }

    public function setTypeOf($value){
        $this->typeOf = $value;
    }

}