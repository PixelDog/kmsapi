<?php

require_once(__DIR__ . "/../Core/Database/Database.php");

use KMS\Database\Database;

/**
* The tickers page model
*/
class TickersModel
{

  /** @var Database */
  private $db;

  public function __construct(){
    $this->db = new Database(HOST, DBUSER, DBPW, DB);
  }

  public function render()
  {
    return $this->renderAllTickers();
  }

  private function renderAllTickers(){
    $query = "
      SELECT * FROM historical
    ";
    return $this->db->dbQuery($query);
  }
}
