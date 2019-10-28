<?php

namespace App;
use App\Config;

class Db
{
  //Instance de la classe PDO
  private $PDOInstance;
  private static $instance;

  //Constructeur
  private function __construct()
  {
    try {
      $dbConfig = new Config('config/db.ini');

      $dsn = 'mysql:host=' . $dbConfig->host .
        ';dbname=' . $dbConfig->dbname;
      $this->PDOInstance  = new \PDO($dsn, $dbConfig->user, $dbConfig->password);
    } catch (Exception $ex) {
     
    }
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new Db();
    }
    return self::$instance;
  }
  
  public function getConnexion()
  {
    return $this->PDOInstance;
  }
}
