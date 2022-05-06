<?php

class Musician
{
  private $db;

  public function __construct()
  {
    $this->db = new Db();
  }

  public function getMusicians()
  {
    $this->db->query('SELECT * FROM musicians');

    $result = $this->db->resultSet();
    return $result;
  }

  public function getMusicianById($id)
  {
    $this->db->query('SELECT * FROM musicians WHERE id=:id');
    $this->db->bind(':id', $id);

    $result = $this->db->single();
    return $result;
  }

  public function getMusicianByName($name)
  {
    $this->db->query('SELECT * FROM musicians WHERE name=:name');
    $this->db->bind(':name', $name);

    $result = $this->db->single();
    return $result;
  }

  public function addMusician($data)
  {
    $this->db->query('INSERT INTO musicians (name,band) VALUES (:name, :band)');

    $this->db->bind(':name', $data['name']);
    $this->db->bind(':band', $data['band']);

    if ($this->db->execute())
      return true;
    return false;
  }

  public function modifyMusicianById($data)
  {
    $this->db->query('UPDATE musicians SET name=:name, band=:band WHERE id=:id');

    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':band', $data['band']);

    if ($this->db->execute())
      return true;
    return false;
  }

  public function deleteMusicianByName($name)
  {
    $this->db->query('DELETE FROM musicians WHERE name=:name');
    $this->db->bind(':name', $name);
    if ($this->db->execute())
      return true;
    return false;
  }
}
