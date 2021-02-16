<?php

namespace Rediite\Model\Repository;

error_reporting(E_ALL);
ini_set('display_errors', 1);

use \Rediite\Model\Entity\Person as PersonEntity;

class PersonRepository
{

  /**
   * @var \PDO
   */
  private $dbAdapter;

  
  public function __construct(
    \PDO $dbAdapter,

  ) {
    $this->dbAdapter = $dbAdapter;
  }

  
  function createPerson(PersonEntity $person)
  {
    $sql =
      <<<SQL
  INSERT INTO Personne (num_enregistrement, nom, prenom, email, signe_astro)
    VALUES (:id, :nom, :prenom, :email, :signe_astro);
SQL;

    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':id', $person->getId(), \PDO::PARAM_INT);
    $stmt->bindValue(':nom', $person->getLastName(), \PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $person->getFirstName(), \PDO::PARAM_STR);
    $stmt->bindValue(':email', $person->getEMail(), \PDO::PARAM_STR);
    $stmt->bindValue(':signe_astro', $person->getZodiacSign(), \PDO::PARAM_STR);
    return $stmt->execute();
  }
}
