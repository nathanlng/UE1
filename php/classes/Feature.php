<?php

class Feature 
{
    private $id;
    private $idCategory;
    private $idPlayer;
    private $value;
    private $display;

    public function __construct($id,$idCategory,$value,$idPlayer,$display) 
    {
        $this->setId($id);
        $this->setValue($value);
        $this->setIdCategory($idCategory);
        $this->setIdPlayer($idPlayer);
        $this->setDisplay($display);
    }

    public function display()
    {
        $requete = DB::getConnection()->prepare("
            update feature
                set
                 display=?
                where id=?");
        $requete->bindValue(1, $this->getDisplay());
        $requete->bindValue(2, $this->getId());
        $requete->execute();
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

    public function delete()
    {
        $requete = DB::getConnection()->prepare("
        update feature
            set
             value=?
            where id=?");
        $requete->bindValue(1, null);
        $requete->bindValue(2, $this->getId());
        $requete->execute();
    }

    public function insert()
    {
        $requete = DB::getConnection()->prepare("insert into feature (id_category,id_player,value,display) values(?,?,?,?)");
        // $requete->blindValue(1,);
        $requete->execute([$this->getIdCategory(),$this->getIdPlayer(),$this->getValue(),$this->getDisplay()]);
        $this->id = DB::getConnection()->lastInsertId();
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from feature where id = ?");
        $requete->execute([$id]);
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); 
        $objet = new Feature(
            $tableau[0]["id"],
            $tableau[0]["id_category"],
            $tableau[0]["value"],
            $tableau[0]["id_player"],
            $tableau[0]["display"]);
        ;  
        return $objet;
    }

    public static function getOneOnCategory($id_category,$id_player)
    {
        $requete = DB::getConnection()->prepare("select * from feature where id_category = ? and id_player = ?");
        $requete->execute([$id_category,$id_player]);
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); 
        if (!empty($tableau[0]["id_category"])) {
            $objet = new Feature(
                $tableau[0]["id"],
                $tableau[0]["id_category"],
                $tableau[0]["value"],
                $tableau[0]["id_player"],
                $tableau[0]["display"]);
            ;  
            return $objet;
        }
        
    }

    // public function getName()
    // {
    //     $requete = DB::getConnection()->prepare("select name from category where id = ?");
    //     $requete->execute([$this->getIdCategory()]);
    //     $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
    //     // var_dump($tableau);
    //     return $tableau[0]["name"];
    // }

    public function getChoice()
    {
        $requete = DB::getConnection()->prepare("select name from choice where value = ?");
        $requete->execute([$this->getValue()]);
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($tableau[0]["name"])) {
            return $tableau[0]["name"];
        }
        // var_dump($tableau);
        
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getIdPlayer()
    {
        return $this->idPlayer;
    }

    public function setIdPlayer($value)
    {
        $this->idPlayer = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function setIdCategory($value)
    {
        $this->idCategory = $value;
    }

    public function getDisplay()
    {
        return $this->display;
    }

    public function setDisplay($display)
    {
        $this->display = $display;
        return $this;
    }
}