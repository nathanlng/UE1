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