<?php

namespace Rediite\Model\Factory;

class dbFactory {

  function createService() {
    return new \PDO('pgsql:dbname=tpcurseurs;host=pgsql2;port=5432"', 'tpcurseurs', 'tpcurseurs');
  }
}
