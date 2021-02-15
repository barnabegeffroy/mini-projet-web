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

  function findClientById(int $id) {
    $sql = 
<<<SQL
  SELECT 
    num_client, 
    nom_client, 
    debit_client
    FROM client WHERE num_client = :id;
SQL;


    $clients = [];
    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    foreach ($stmt->fetchAll() as $rawClient) {
        $clients[] = $this->clientHydrator->hydrate($rawClient);
    }
    return $clients;
  }

  function changeClientDebit(int $id, float $debit) {
    $sql = 
<<<SQL
  UPDATE client
    SET debit_client = :debit
    WHERE num_client = :id;
SQL;

    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->bindValue(':debit', $debit, \PDO::PARAM_INT);
    return $stmt->execute();
  }

  function createClient(int $id, string $lastName, float $debit) {
    $sql = 
<<<SQL
  INSERT INTO client (num_client, nom_client, debit_client)
    VALUES (:id, :lastName, :debit);
SQL;

    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->bindValue(':lastName', $lastName, \PDO::PARAM_STR);
    $stmt->bindValue(':debit', $debit, \PDO::PARAM_INT);
    return $stmt->execute();
  }

}


