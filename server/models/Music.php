<?php
class Music
{
  private $db;

  public function __construct()
  {
    $this->db = new Db();
  }

  public function getMusicById($id)
  {
    $this->db->query("SELECT * FROM musics Where id = :id");
    $this->db->bind(':id', $id);
    $result = $this->db->single();
    return $result;
  }

  public function getRandMusic($offset, $limit)
  {
    $this->db->query("SELECT * FROM musics ORDER BY RAND() LIMIT 10");
    $result = $this->db->resultSet();
    return $result;
  }

  public function addMusic($data)
  {
    $this->db->query('INSERT INTO musics (name, year ,genre, url) VALUES (:name, :year, :genre, :url)');

    $this->db->bind(':name', $data['name']);
    $this->db->bind(':year', $data['year']);
    $this->db->bind(':genre', $data['genre']);
    $this->db->bind(':url', $data['url']);
    $this->db->execute();


    $this->db->query('SELECT id FROM musics WHERE name=:name');
    $this->db->bind(':name', $data['name']);
    $music_id = $this->db->single()->id;



    foreach ($data['musicians'] as $key => $musician) {
      $this->db->query('SELECT id FROM musicians WHERE name=:name');
      $this->db->bind(':name', $musician);
      $musician_id = $this->db->single()->id;

      if ($musician_id) {
        $this->db->query('INSERT INTO musics_musicians (music_id, musician_id) VALUES (:music_id, :musician_id)');
        $this->db->bind(':music_id', $music_id);
        $this->db->bind(':musician_id', $musician_id);
        $this->db->execute();
      }
    }

    return true;
  }

  public function getMusicians($music_id)
  {
    $this->db->query('SELECT name,band FROM musics_musicians JOIN musicians ON musician_id=id WHERE music_id=:music_id');
    $this->db->bind(':music_id', $music_id);

    $result = $this->db->resultSet();
    return $result;
  }
}
