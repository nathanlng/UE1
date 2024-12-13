<?php
class User {
    private $id;
    private $login;
    private $password;
    private $typeOf;
    private $player=null;
    private $recruiter=null;

    public function __construct($id,$login,$password,$typeOf) {
        $this->setId($id);
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setTypeOf($typeOf);
    }

    public static function getAll(){

        /* utilise la fonction statique dans DB qui renvoie un objet PDO.
        Cet objet PDO a une fonction "prepare" qui prend comme paramètre la requete SQL
        */
        $requete = DB::getConnection()->prepare("select * from user");
        $requete->execute();// execution de la requete
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $tabObjets = [];
        foreach($tableau as $ligne){
            $tabObjets[] = new User(
                $ligne["id"],
                $ligne["login"],
                $ligne["password"],
                $ligne["type_of"],);
        }
        return $tabObjets;
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from user where id = ?");
        $requete->execute([$id]); // execution de la requete avec le paramètre à la place de ? dans le texte de la requête
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $objet = new Feature(
            $tableau[0]["id"],
            $tableau[0]["login"],
            $tableau[0]["password"],
            $tableau[0]["type_of"]
        );
        return $objet;
    }

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

    public function getPlayer(){
        return $this->player;
    }

    public function setPlayer($value){
        $this->player = $value;
    }

    public function getRecruiter(){
        return $this->recruiter;
    }

    public function setRecruiter($value){
        $this->recruiter = $value;
    }

}