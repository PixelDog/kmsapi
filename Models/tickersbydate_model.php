<?php

require_once(__DIR__ . "/../Core/Database/Database.php");
require_once(__DIR__ . "/../Core/Traits/Array/ArrayUtils.php");

use KMS\Database\Database;
use KMS\Traits\ArrayUtils;

/**
* The tickers by date page model
*/
class TickersbydateModel
{
  use KMS\Traits\ArrayUtils;

  /** @var Database */
  private $db;

  public function __construct(){
    $this->db = new Database(HOST, DBUSER, DBPW, DB);
  }

  public function render()
  {
    return $this->renderTickersByDate();
  }

  private function renderTickersByDate(){
    $requiredFromRequest = ['dateFrom', 'dateTo', 'tickers'];

    if(!$this->checkRequired($requiredFromRequest, $_GET)){
      die( "You have not passed the proper params for the request.
            Please pass only this: " . implode(', ', $requiredFromRequest)
      );
    }

    $replacements = "ss";

    $tickers = explode(",", $_GET['tickers']);
    $inClause = "'" . implode ( "', '", $tickers ) . "'";

    $replacements = $types . $replacements;

    $query = "
      SELECT
        c.name,
        c.ticker,
        h.d,
        h.high,
        h.low,
        h.close
      FROM
        companies c
      JOIN
        historical h on c.company_id = h.company_id
      WHERE
        c.ticker in ($inClause)
      AND
        h.d BETWEEN ? AND ?
      GROUP BY h.d, c.name, c.ticker, h.high, h.low, h.close;
    ";

    return $this->db->dbQuery($query, "ss", [$_GET['dateFrom'], $_GET['dateTo']]);
  }
}
