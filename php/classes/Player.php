<?php

class Player extends User
{
    
    private $name;
    private $firstName;
    private int $age;
    private $picture;
    private $description;
    private $display;
    private $features =[];


    public function __construct($id,$name,$firstName,$age,$description=null,$display,$picture = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png") 
    {
        $user=User::getOne($id);
        parent::__construct($id,$user->login,$user->password,$user->typeOf);
        $this->setName($name);
        $this->setFirstName($firstName);
        $this->setAge($age);
        $this->setPicture($picture);
        $this->setDescription($description);
        $this->setDisplay($display);
    }

    public static function getAll()
    {

        /* utilise la fonction statique dans DB qui renvoie un objet PDO.
        Cet objet PDO a une fonction "prepare" qui prend comme paramètre la requete SQL
        */
        $requete = DB::getConnection()->prepare("select * from player");
        $requete->execute();// execution de la requete
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $tabObjets = [];
        foreach($tableau as $ligne)
        {
            $tabObjets[] = new Player
            (
                $ligne["id"],
                $ligne["name"],
                $ligne["first_name"],
                $ligne["age"],
                $ligne["description"],
                $ligne["display"],
                $ligne["picture"]
            );
        }
        return $tabObjets;
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from player where id = ?");
        $requete->execute([$id]); // execution de la requete avec le paramètre à la place de ? dans le texte de la requête
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $objet = new Player(
            $id,
            $tableau[0]["name"],
            $tableau[0]["first_name"],
            $tableau[0]["age"],
            $tableau[0]["description"],
            $tableau[0]["display"],
            $tableau[0]["picture"]);
        ;  
        return $objet;
    }

    public function getFeatures()
    {
        $requete = DB::getConnection()->prepare("select id from feature where id_player = ?");
        $requete->execute([$this->getId()]);
        $results = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $ligne)
        {
            $this->features[]=Feature::getOne($ligne["id"]);
        }
        return $this->features;
    }
    
    public function update()
    {
        $requete = DB::getConnection()->prepare("
            update player
                set name=?,
                 first_name=?,
                 age=?,
                 picture=?,
                description=?,
                display=?
                where id=?");
        $requete->bindValue(1, $this->getName());
        $requete->bindValue(2, $this->getFirstName());
        $requete->bindValue(3, $this->getAge());
        $requete->bindValue(4, $this->getPicture());
        $requete->bindValue(5, $this->getDescription());
        $requete->bindValue(6, $this->getDisplay());
        $requete->bindValue(7, $this->getId());
        $requete->execute();
    }

    public function addFeatures($feature)
    {
        $this->features []= $feature;
    }

    public function getId()
    {
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

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($value)
    {
        $this->firstName = $value;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($value)
    {
        $this->age = $value;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($value)
    {
        $this->picture = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
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