<?php
class Caracteristique{
    private $id;
    private $nom;
    private $typeOf;

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($value){
        $this->nom = $value;
    }

    public function getTypeOf(){
        return $this->typeOf;
    }

    public function setTypeOf($value){
        $this->typeOf = $value;
    }
}