<?php
class Db
{
  private static $pdo = NULL;

  public static function getConnection()
  {
    if (isset(self::$pdo))
      return self::$pdo;

    try {
      $host = 'localhost';
      $dbName = 'project2A19';
      $user = 'root';
      $pwd = '';

      $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
      $pdo = new PDO($dsn, $user, $pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      self::$pdo = $pdo;
      return $pdo;
    } catch (PDOException $e) {
      die('Error: ' . $e->getMessage());
    }
  }
}
