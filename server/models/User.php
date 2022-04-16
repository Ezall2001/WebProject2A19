<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Db();
  }

  public function getUsers()
  {
    $this->db->query("SELECT * FROM users");
    $result = $this->db->resultSet();
    return $result;
  }
}
