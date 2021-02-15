<?php
namespace Rediite\Model\Repository;

error_reporting(E_ALL);
ini_set('display_errors', 1);

use \Rediite\Model\Entity\Person;


class PersonRepository {

    /**
     * @var \PDO
     */
  private $dbAdapter;

  /**
   * @var CommentHydrator
   */
  private $personHydrator;

  public function __construct(
    \PDO $dbAdapter,
    \Rediite\Model\Hydrator\PersonHydrator $personHydrator
  ) {
    $this->dbAdapter = $dbAdapter;
    $this->personHydrator = $personHydrator;
  }

  function createPerson(int $id, string $nom, string $prenom, string $email, string $signe_astro) {
    $sql = 
<<<SQL
  INSERT INTO Personne (num_enregistrement, nom, prenom, email, signe_astro)
    VALUES (:id, :nom, :prenom, :email, :signe_astro);
SQL;

    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->bindValue(':nom', $nom, \PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
    $stmt->bindValue(':signe_astro', $signe_astro, \PDO::PARAM_STR);
    return $stmt->execute();
  }

}


