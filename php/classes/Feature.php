<?php
class Feature {
    private $id;
    private $idCategory;
    private $idPlayer;
    private $value;

    public function __construct($idCategory,$value,$idPlayer) {
        $this->setValue($value);
        $this->setIdCategory($idCategory);
        $this->setIdPlayer($idPlayer);
    }

    public function update()
    {
        $requete = DB::getConnection()->prepare("
            update feature
                set
                 value=?
                where id=?");
        $requete->bindValue(1, $this->getValue());
        $requete->bindValue(2, $this->getId());
        $requete->execute();
    }

    public static function delete($id)
    {
        $requete = DB::getConnection()->prepare("
            delete from feature where id=?");
        $requete->bindValue(1, $id);
        $requete->execute();
    }

    public function insert(){
        $requete = DB::getConnection()->prepare("insert into feature (id_category,id_player,value) values(?,?,?)");
        // $requete->blindValue(1,);
        $requete->execute([$this->getIdCategory(),$this->getIdPlayer(),$this->getValue()]);
        $this->id = DB::getConnection()->lastInsertId();
    }


    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getIdPlayer(){
        return $this->idPlayer;
    }

    public function setIdPlayer($value){
        $this->idPlayer = $value;
    }

    public function getValue(){
        return $this->value;
    }

    public function setValue($value){
        $this->value = $value;
    }

    public function getIdCategory(){
        return $this->idCategory;
    }

    public function setIdCategory($value){
        $this->idCategory = $value;
    }
}