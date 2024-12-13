<?php 
class Choice {
    private $id;
    private $name;
    private $value;
    private $idFeature;

    public function __construct($id,$name,$value,$idFeature) {
        $this->setId($id);
        $this->setName($name);
        $this->setValue($value);
        $this->setIdFeature($idFeature);
    }

    public function update()
    {
        $requete = DB::getConnection()->prepare("
            update choice
                set name=?,
                 value=?
                where id=?");
        $requete->bindValue(1, $this->getName());
        $requete->bindValue(2, $this->getValue());
        $requete->bindValue(3, $this->getId());
        $requete->execute();
    }

    public static function delete($id)
    {
        $requete = DB::getConnection()->prepare("
            delete from choice where id=?");
        $requete->bindValue(1, $id);
        $requete->execute();
    }

    public static function getAll(){

        $requete = DB::getConnection()->prepare("select * from choice order by id_feature");
        $requete->execute();// execution de la requete
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $tabObjets = [];
        foreach($tableau as $ligne){
            $tabObjets[] = new Choice(
                $ligne["id"],
                $ligne["name"],
                $ligne["value"],
                $ligne["id_feature"]);
        }
        return $tabObjets;
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from choice where id = ?");
        $requete->execute([$id]); // execution de la requete avec le paramètre à la place de ? dans le texte de la requête
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); // je mets le résultat dans une variable tableau
        $objet = new Choice(
            $tableau[0]["id"],
            $tableau[0]["name"],
            $tableau[0]["value"],
            $tableau[0]["id_feature"]
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

    public function getValue(){
        return $this->value;
    }

    public function setValue($value){
        $this->value = $value;
    }

    public function getIdFeature(){
        return $this->idFeature;
    }

    public function setIdFeature($value){
        $this->idFeature = $value;
    }
}