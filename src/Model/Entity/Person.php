<?php

namespace Rediite\Model\Entity;

class Person
{

    /**
     * @var int
     */
    private static $count = 0;

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
    private $zodiacSignPerson;


    public function __construct(
        string $prenom,
        string $nom,
        string $email
    ) {
        $this->idPerson = $this->count;
        $this->lastNamePerson = $nom;
        $this->firstNamePerson = $prenom;
        $this->emailPerson = $email;
        $this->count++;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->idPerson;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastNamePerson;
    }

    /**
     * @param mixed $lastName
     * @return Person
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
     * @param mixed $firstName
     * @return Person
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
     * @param mixed $email
     * @return Person
     */
    public function setEMail($email)
    {
        $this->emailPerson = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZodiacSign()
    {
        return $this->zodiacSignPerson;
    }

    /**
     * @param mixed $sign
     * @return Person
     */
    public function setZodiacSign($sign)
    {
        $this->zodiacSignPerson=$sign;
        return $this
    }
}
