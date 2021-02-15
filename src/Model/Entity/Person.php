<?php

namespace Rediite\Model\Entity;

class Person
{

    /**
     * @var int
     */
    private $idPerson;

    /**
     * @var string
     */
    private $lastNamePerson;

    /**
     * @var string
     */
    private $firstNamePerson;

    /**
     * @var string
     */
    private $emailPerson;

    /**
     * @var string
     */
    private $astroSignPerson;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->idPerson;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->idPerson = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastNamePerson;
    }

    /**
     * @param mixed $login
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastNamePerson = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstNamePerson;
    }

    /**
     * @param mixed $login
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstNamePerson = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->emailPerson;
    }

    /**
     * @param mixed $login
     * @return User
     */
    public function setEMail($email)
    {
        $this->emailPerson = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAstroSign()
    {
        return $this->astroSignPerson;
    }

    /* ------------------------------------------
    à revoir
    ---------------------------------------------
    *
     * @param mixed $login
     * @return User
    
    public function setAstroSign($email)
    {
        $this->emailPerson = $email;
        return $this;
    } 
    ----------------------------------------------
    ----------------------------------------------
    */
  
}
