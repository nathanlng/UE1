<?php

class Category
{
    private $id;
    private $name;
    private $typeOf;
    private $choices =[];

    public function __construct($id,$name,$typeOf) 
    {
        $this->setId($id);
        $this->setName($name);
        $this->setTypeOf($typeOf);
    }

    public function update()
    {
        $requete = DB::getConnection()->prepare("
            update category
                set name=?
                where id=?");
        $requete->bindValue(1, $this->getName());
        $requete->bindValue(2, $this->getId());
        $requete->execute();
    }

    public static function delete($id)
    {
        $requete = DB::getConnection()->prepare("
            delete from category where id=?");
        $requete->bindValue(1, $id);
        $requete->execute();
    }

    public static function getAll()
    {
        $requete = DB::getConnection()->prepare("select * from category");
        $requete->execute();
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
        $tabObjets = [];
        foreach($tableau as $ligne)
        {
            $tabObjets[] = new Category(
                $ligne["id"],
                $ligne["name"],
                $ligne["type_of"],);
        }
        return $tabObjets;
    }

    public function insert(){

        $requete = DB::getConnection()->prepare("INSERT INTO category (name,type_of) VALUES (?,?)");
        $requete->execute([$this->getName(),$this->getTypeOf()]);
        $this->id = DB::getConnection()->lastInsertId();
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from category where id = ?");
        $requete->execute([$id]); 
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
        $objet = new Category(
            $tableau[0]["id"],
            $tableau[0]["name"],
            $tableau[0]["type_of"]
        );
        return $objet;
    }

    public function getChoices($id){
        $requete = DB::getConnection()->prepare("select id from choice where id_category = ?");
        $requete->execute([$id]);
        $results = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $ligne){
            $this->choices[]=Choice::getOne($ligne["id"]);
        }
        return $this->choices;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getTypeOf()
    {
        return $this->typeOf;
    }

    public function setTypeOf($value)
    {
        $this->typeOf = $value;
    }


}