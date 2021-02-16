<?php

namespace Rediite\Model\Factory;

class dbFactory {

  function createService() {
    return new \PDO('pgsql:dbname=ipw_alexia_harivel;host=pgsql2;port=5432"', 'ipw_alexia_harivel', 'ipw_alexia_harivel');
  }
}
