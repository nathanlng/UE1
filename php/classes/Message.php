<?php

class Message 
{

    private $id;
    private $idChat;
    private $text;
    private $dateTime;
    private $sender;
    

    public function __construct($id,$idChat,$text,$dateTime,$sender) 
    {
        $this->setId($id);
        $this->setIdChat($idChat);
        $this->setText($text);
        $this->setDateTime($dateTime);
        $this->setSender($sender);
    }

    public function insert()
    {
        $requete = DB::getConnection()->prepare("INSERT INTO message (id_chat,text,date_time,sender) VALUES (?,?,?,?)");
        $requete->execute([$this->getIdChat(),$this->getText(),$this->getDateTime(),$this->getSender()]);
        $this->id = DB::getConnection()->lastInsertId();
    }

    public static function getOne($id)
    {
        $requete = DB::getConnection()->prepare("select * from message where id = ?");
        $requete->execute([$id]); 
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
        $objet = new Message
        (
            $tableau[0]["id"],
            $tableau[0]["id_chat"],
            $tableau[0]["text"],
            $tableau[0]["date_time"],
            $tableau[0]["sender"]
        );
        return $objet;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getIdChat()
    {
        return $this->idChat;
    }

    public function setIdChat($idChat)
    {
        $this->idChat = $idChat;
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }
}