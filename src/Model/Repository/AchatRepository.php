<?php
namespace Rediite\Model\Repository;

error_reporting(E_ALL);
ini_set('display_errors', 1);

use \Rediite\Model\Entity\Achat;


class AchatRepository {

    /**
     * @var \PDO
     */
  private $dbAdapter;

  /**
   * @var CommentHydrator
   */
  private $achatHydrator;

  public function __construct(
    \PDO $dbAdapter,
    \Rediite\Model\Hydrator\AchatHydrator $achatHydrator
  ) {
    $this->dbAdapter = $dbAdapter;
    $this->achatHydrator = $achatHydrator;
  }

  function findAchatById(int $id) {
    $sql = 
<<<SQL
  SELECT 
    num_achat, 
    montant_achat, 
    date_achat,
    client
    FROM achat WHERE num_achat = :id;
SQL;


    $achats = [];
    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    foreach ($stmt->fetchAll() as $rawAchat) {
        $achats[] = $this->achatHydrator->hydrate($rawAchat);
    }
    return $achats;
  }

  function changeAchatAmount(int $id, float $amount) {
    $sql = 
<<<SQL
  UPDATE achat
    SET montant_achat = :amount
    WHERE num_achat = :id;
SQL;

    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->bindValue(':amount', $amount, \PDO::PARAM_INT);
    return $stmt->execute();
  }

  function createAchat(float $amount, int $client) {
    $sql = 
<<<SQL
  INSERT INTO achat (montant_achat, date_achat, client)
    VALUES (:amount, NOW(), :client);
SQL;

    $stmt = $this->dbAdapter->prepare($sql);
    $stmt->bindValue(':amount', $amount, \PDO::PARAM_INT);
    $stmt->bindValue(':client', $client, \PDO::PARAM_INT);
    return $stmt->execute();
  }

}


