<?php 

class Recruiter extends User
{
    private $name;
    private $firstName;
    private $licence;

    public function __construct($id,$name,$firstName) {
        $user=User::getOne($id);
        parent::__construct($id,$user->login,$user->password,$user->typeOf);
        $this->setName($name);
        $this->setFirstName($firstName);
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from recruiter where id = ?");
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLicence()
    {
        return $this->licence;
    }

    public function setLicence($licence)
    {
        $this->licence = $licence;
        return $this;
    }
}