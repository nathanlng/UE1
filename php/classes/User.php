<?php

class User 
{

    protected $id;
    protected $login;
    protected $password;
    protected $typeOf;
    private $feedbacks = [];


    public function __construct($id,$login,$password,$typeOf) 
    {
        $this->setId($id);
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setTypeOf($typeOf);
        $this->feedbacks = [];
    }

    public static function getAll()
    {

        /* utilise la fonction statique dans DB qui renvoie un objet PDO.
        Cet objet PDO a une fonction "prepare" qui prend comme paramètre la requete SQL
        */
        $requete = DB::getConnection()->prepare("select * from user");
        $requete->execute();// execution de la requete
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $tabObjets = [];
        foreach($tableau as $ligne)
        {
            $tabObjets[] = new User
            (
                $ligne["id"],
                $ligne["login"],
                $ligne["password"],
                $ligne["type_of"]
            );
        }
        return $tabObjets;
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from user where id = ?");
        $requete->execute([$id]); // execution de la requete avec le paramètre à la place de ? dans le texte de la requête
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        if (!empty($tableau[0]["id"])) {
            $objet = new User
            (
                $tableau[0]["id"],
                $tableau[0]["login"],
                $tableau[0]["password"],
                $tableau[0]["type_of"]
            );
            return $objet;
        }
        return "error";
    }

    public function getFeedback($id)
    {
        $requete = DB::getConnection()->prepare("select id from feedback where id_user = ?");
        $requete->execute([$id]);
        $results = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $ligne)
        {
            $this->feedbacks[]=Feedback::getOne($ligne["id"]);
        }
        return $this->feedbacks;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($value)
    {
        $this->login = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
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