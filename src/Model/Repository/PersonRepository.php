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
    \PDO $dbAdapter
  ) {
    $this->dbAdapter = $dbAdapter;
  }

  function changeDateToSign(PersonEntity $person, $jour, $mois)
  {
    $birthDay = date_parse_from_format('d-m', "$jour-$mois");
    $day = $birthDay['day'];
    $mounth = $birthDay['mounth'];
    $request = $this->dbAdapter->prepare(
      'SELECT
              signe_zodiac
          FROM
          Signe
          WHERE
              mois_debut <= :mounth
              AND mois_fin >= :mounth
              AND jour_debut <= :jour
              AND jour_fin >= :jour'
    );
    $request->bindValue(':day', $day, \PDO::PARAM_STR);
    $request->bindValue(':mounth', $mounth, \PDO::PARAM_STR);
    $request->execute();

    $person->setZodiacSign($request->fetch());
    return $this;
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
