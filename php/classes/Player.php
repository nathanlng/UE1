<?php
class Player extends User{
    private $name;
    private $firstName;
    private int $age;
    private $picture;
    private $description;
    private $features =[];

    public function __construct($name,$firstName,$age,$picture,$description) {
        $this->setName($name);
        $this->setFirstName($firstName);
        $this->setAge($age);
        $this->setPicture($picture);
        $this->setDescription($description);
    }

    public static function getAll(){

        /* utilise la fonction statique dans DB qui renvoie un objet PDO.
        Cet objet PDO a une fonction "prepare" qui prend comme paramètre la requete SQL
        */
        $requete = DB::getConnection()->prepare("select * from player");
        $requete->execute();// execution de la requete
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $tabObjets = [];
        foreach($tableau as $ligne){
            $tabObjets[] = new Player(
                $ligne["name"],
                $ligne["firstName"],
                $ligne["age"],
                $ligne["picture"],
                $ligne["description"]);
        }
        return $tabObjets;
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from player where id = ?");
        $requete->execute([$id]); // execution de la requete avec le paramètre à la place de ? dans le texte de la requête
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $objet = new Player(
            $tableau[0]["name"],
            $tableau[0]["first_name"],
            $tableau[0]["age"],
            $tableau[0]["picture"],
            $tableau[0]["description"]);
        ;  
        $user=User::getOne($id);
        $objet->id=$user->id;
        $objet->login=$user->login;
        $objet->password=$user->password;
        $objet->typeOf=$user->typeOf;
        return $objet;
    }
    

    public function addFeatures($feature){
        $this->features []= $feature;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($value){
        $this->firstName = $value;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($value){
        $this->age = $value;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function setPicture($value){
        $this->picture = $value;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($value){
        $this->description = $value;
    }

    public function getFeatures(){
        return $this->features;
    }

    // public function setFeatures($value){
    //     $this->features = $value;
    // }
}