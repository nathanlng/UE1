<?php

class Feedback 
{
    private $id;
    private $idUser;
    private $title;
    private $dateTime;
    private $note;
    private $feedback;
    private $mail;
    private $country;
    private $city;

    public function __construct($id,$idUser,$title,$dateTime,$note,$feedback,$mail,$country,$city) 
    {
        $this->setId($id);
        $this->setIdUser($idUser);
        $this->setTitle($title);
        $this->setDateTime($dateTime);
        $this->setNote($note);
        $this->setFeedback($feedback);
        $this->setMail($mail);
        $this->setCountry($country);
        $this->setCity($city);
    }

    public function insert(){

        $requete = DB::getConnection()->prepare("insert into feedback (id_user,title,date_time,note,feedback,mail,country,city) values(?,?,?,?,?,?,?,?)");
        $requete->execute([$this->getIdUser(),$this->getTitle(),$this->getDateTime(),$this->getNote(),$this->getFeedback(),$this->getMail(),$this->getCountry(),$this->getCity()]);
        $this->id = DB::getConnection()->lastInsertId();
    }

    public static function delete($id)
    {
        $requete = DB::getConnection()->prepare("
            delete from feedback where id=?");
        $requete->bindValue(1, $id);
        $requete->execute();
    }

    public static function getAll()
    {
        $requete = DB::getConnection()->prepare("select * from feedback");
        $requete->execute();
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); 
        $tabObjets = [];
        foreach($tableau as $ligne){
            $tabObjets[] = new Feedback(
                $ligne["id"],
                $ligne["id_user"],
                $ligne["title"],
                $ligne["date_time"],
                $ligne["note"],
                $ligne["feedback"],
                $ligne["mail"],
                $ligne["country"],
                $ligne["city"],);
        }
        return $tabObjets;
    }


    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from feedback where id = ?");
        $requete->execute([$id]);
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC); 
        $objet = new Feedback(
            $tableau[0]["id"],
            $tableau[0]["id_user"],
            $tableau[0]["title"],
            $tableau[0]["date_time"],
            $tableau[0]["note"],
            $tableau[0]["feedback"],
            $tableau[0]["mail"],
            $tableau[0]["country"],
            $tableau[0]["city"],);
        ;  
        return $objet;
    }

    public function getUser()
    {
        return User::getOne($this->getIdUser());
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($value)
    {
        $this->idUser = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function setDateTime($value)
    {
        $this->dateTime = $value;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($value)
    {
        $this->note = $value;
    }

    public function getFeedback()
    {
        return $this->feedback;
    }

    public function setFeedback($value)
    {
        $this->feedback = $value;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($value)
    {
        $this->mail = $value;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($value)
    {
        $this->country = $value;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($value)
    {
        $this->city = $value;
    }

}