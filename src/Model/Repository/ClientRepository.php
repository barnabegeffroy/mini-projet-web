<?php
namespace Rediite\Model\Repository;

error_reporting(E_ALL);
ini_set('display_errors', 1);

use \Rediite\Model\Entity\Client;


class ClientRepository {

    /**
     * @var \PDO
     */
  private $dbAdapter;

  /**
   * @var CommentHydrator
   */
  private $clientHydrator;

  public function __construct(
    \PDO $dbAdapter,
    \Rediite\Model\Hydrator\ClientHydrator $clientHydrator
  ) {
    $this->dbAdapter = $dbAdapter;
    $this->clientHydrator = $clientHydrator;
  }

  function createClient(int $id, string $nom, string $prenom, string $email, string $signe_astro) {
    $sql = 
<<<SQL
  INSERT INTO client (num_enregistrement, nom, prenom, email, signe_astro)
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


