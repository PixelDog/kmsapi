<?php

namespace KMS\Database;

class Database
{


  /** @var string */
  private $hostName;

  /** @var string */
  private $userName;

  /** @var string */
  private $passWord;

  /** @var string */
  private $db;

  /** $var mysqli */
  public $conn;

  public function __construct(
    string $hostName,
    string $userName,
    string $passWord,
    string $db
    )
    {
      $this->hostName = $hostName;
      $this->userName = $userName;
      $this->passWord = $passWord;
      $this->db = $db;
      $this->connect();
    }

    /**
    * Create DB connection
    */
    private function connect()
    {
      // Create connection
      $this->conn = new \mysqli($this->hostName, $this->userName, $this->passWord, $this->db);

      // Check connection
      if ($this->conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    }

    /*
    * query the Database
    * @param string $query
    * @param string $types
    * @param array $subs
    * @return string
    */
    public function dbQuery(string $query, string $types = null, array $subs = null): string
    {

      if(empty($subs)){
        $queryResults = [];
        if ($result = $this->conn->query($query)) {
          while($row = $result->fetch_assoc()) {
            $queryResults[] = $row;
          }
        }
        return json_encode($queryResults);
      }

      $statement = $this->conn->prepare($query);

      $statement->bind_param($types, ...$subs);

      $statement->execute();
      $result = $statement->get_result();

      while($row = $result->fetch_assoc()) {
        $queryResults[] = $row;
      }

      return json_encode($queryResults);
    }

    /*
    * insert to the Database
    * @param string $query
    * @param string $types
    * @param array $subs
    * @return bool
    */
    public function dbInsert(string $query, string $types = null, array $subs = null): bool
    {
      $statement = $this->conn->prepare($query);

      if(!empty($subs)){
        $statement->bind_param($types, ...$subs);
      }
      $statement->execute();
      $result = $statement->get_result(); // get the mysqli result

      return $result;
    }

    /*
    * @param string $query
    */
    public function dbSampleInstall(string $query)
    {
      $statement = $this->conn->multi_query($query);
    }
  }
