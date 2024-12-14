<?php
class Category{
    private $id;
    private $name;
    private $typeOf;

    public function __construct($id,$name,$typeOf) {
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

    public static function getAll(){

        /* utilise la fonction statique dans DB qui renvoie un objet PDO.
        Cet objet PDO a une fonction "prepare" qui prend comme paramètre la requete SQL
        */
        $requete = DB::getConnection()->prepare("select * from category");
        $requete->execute();// execution de la requete
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $tabObjets = [];
        foreach($tableau as $ligne){
            $tabObjets[] = new Category(
                $ligne["id"],
                $ligne["name"],
                $ligne["type_of"],);
        }
        return $tabObjets;
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from category where id = ?");
        $requete->execute([$id]); // execution de la requete avec le paramètre à la place de ? dans le texte de la requête
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $objet = new Category(
            $tableau[0]["id"],
            $tableau[0]["name"],
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

    public function getName(){
        return $this->name;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function getTypeOf(){
        return $this->typeOf;
    }

    public function setTypeOf($value){
        $this->typeOf = $value;
    }


}