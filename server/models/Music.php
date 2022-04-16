<?php
class Music
{
  private $db;

  public function __construct()
  {
    $this->db = new Db();
  }

  public function getMusic()
  {
    $this->db->query("SELECT * FROM music");
    $result = $this->db->resultSet();
    return $result;
  }
}
