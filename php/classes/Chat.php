<?php

class Chat 
{

    private $id;
    private $idRecruiter;
    private $idPlayer;
    private $permission;
    private $messages = [];


    public function __construct($id,$idPlayer,$idRecruiter,$permission) 
    {
        $this->setId($id);
        $this->setIdPlayer($idPlayer);
        $this->setIdRecruiter($idRecruiter);
        $this->setPermission($permission);
    }

    public function insert()
    {

        $requete = DB::getConnection()->prepare("INSERT INTO chat (id_player,id_recruiter,permission) VALUES (?,?,?)");
        $requete->execute([$this->getIdPlayer(),$this->getIdRecruiter(),$this->getPermission()]);
        $this->id = DB::getConnection()->lastInsertId();
    }

    public function update()
    {
        $requete = DB::getConnection()->prepare("
            update category
                set permission = ?
                where id = ?");
        $requete->bindValue(1, $this->getPermission());
        $requete->bindValue(2, $this->getId());
        $requete->execute();
    }

    public static function getAll($id,$role)
    {   
        if ($role=="player") 
        {
            $requete = DB::getConnection()->prepare("select * from chat where id_player = ?");
        }
        else
        {
            $requete = DB::getConnection()->prepare("select * from chat where id_recruiter = ?");
        }
        
        $requete->execute([$id]);
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
        $tabObjets = [];
        foreach($tableau as $ligne)
        {
            $tabObjets[] = new Chat
            (
                $ligne["id"],
                $ligne["id_player"],
                $ligne["id_recruiter"],
                $ligne["permission"]
            );
        }
        return $tabObjets;
    }

    public static function getOne($idRecruiter,$idPlayer)
    {
        $requete = DB::getConnection()->prepare("select * from chat where id_player = ? and id_recruiter = ?");
        $requete->execute([$idPlayer,$idRecruiter]); 
        $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
        if (isset($tableau[0]["id"])) 
        {
            $objet = new Chat
            (
                $tableau[0]["id"],
                $tableau[0]["id_player"],
                $tableau[0]["id_recruiter"],
                $tableau[0]["permission"]
            );
            return $objet;
        }
        return null;
    }

    public function getPermission()
    {
        return $this->permission;
    }

    public function setPermission($permission)
    {
        $this->permission = $permission;
        return $this;
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
 
    public function getIdPlayer()
    {
        return $this->idPlayer;
    }

    public function setIdPlayer($idPlayer)
    {
        $this->idPlayer = $idPlayer;
        return $this;
    }

    public function getIdRecruiter()
    {
        return $this->idRecruiter;
    }

    public function setIdRecruiter($idRecruiter)
    {
        $this->idRecruiter = $idRecruiter;
        return $this;
    }

    public function getMessages($id)
    {
        $requete = DB::getConnection()->prepare("select * from message where id_chat = ?");
        $requete->execute([$id]);
        $results = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $ligne)
        {
            $this->messages[] = Message::getOne($ligne["id"]);
        }
        return $this->messages;
    }
}