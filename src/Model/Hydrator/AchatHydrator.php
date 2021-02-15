<?php

namespace Rediite\Model\Hydrator;
error_reporting(E_ALL);
ini_set('display_errors', 1);

use \Rediite\Model\Entity\Achat as AchatEntity;

class AchatHydrator {
  public function hydrate($data): AchatEntity
  {
    $achat = new AchatEntity();
    $achat
      ->setNum($data['num_achat'])
      ->setMontant($data['montant_achat'])
      ->setDate($data['date_achat'])
      ->setClient($data['client']);
    return $achat;
  }
}
