<?php
class Musics extends Controller
{
  public function __construct()
  {
    $this->musicModel = $this->model('Music');
  }

  public function getById()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
        $response =  $this->musicModel->getMusicById($_GET['id']);
        echo json_encode($response);
      }
    }
  }

  public function getMusicians()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
        $response = $this->musicModel->getMusicians($_GET['id']);
        echo json_encode($response);
      }
    }
  }

  public function getRand()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $response = $this->musicModel->getRandMusic(0, 0);

      header("Content-Type: application/json");
      echo json_encode($response);
    }
  }

  public function add()
  {
    $response = (object) [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'name' => $_POST['name'],
        'year' => $_POST['year'],
        'genre' => $_POST['genre'],
        'url' => $_POST['url'],
        'musicians' => $_POST['musician']
      ];

      $response->nameErr = $this->validateName($data['name']);
      $response->yearErr = $this->validateYear($data['year']);
      $response->genreErr = $this->validateGenre($data['genre']);
      $response->urlErr = $this->validateUrl($data['url']);
      $response->musicianErr = $this->validateMusicians($data['musicians']);

      if (
        $response->nameErr == '' &&
        $response->yearErr == '' &&
        $response->genreErr == '' &&
        $response->urlErr == '' &&
        $response->musicianErr == ''
      ) {

        if ($this->musicModel->addMusic($data))
          $response->status = '200';
      } else {
        $response->status = '400';
      }

      echo json_encode($response);
    }
  }

  public function modify()
  {
    $response = (object) [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'year' => $_POST['year'],
        'genre' => $_POST['genre'],
        'url' => $_POST['url'],
      ];

      $response->nameErr = $this->validateName($data['name']);
      $response->yearErr = $this->validateYear($data['year']);
      $response->genreErr = $this->validateGenre($data['genre']);
      $response->urlErr = $this->validateUrl($data['url']);

      if (
        $response->nameErr == '' &&
        $response->yearErr == '' &&
        $response->genreErr == '' &&
        $response->urlErr == ''
      ) {

        if ($this->musicModel->modifyMusic($data))
          $response->status = '200';
      } else {
        $response->status = '400';
      }

      echo json_encode($response);
    }
  }

  public function delete()
  {
    $response = (object) [];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

      if ($this->musicModel->deleteMusic($_GET['id']))
        $response->status = '200';
    } else {
      $response->status = '400';
    }

    echo json_encode($response);
  }

  public function getByKeyword()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $res = $this->musicModel->getMusicByKeyword($_GET['keyword']);
      echo json_encode($res);
    }
  }

  public function getByName()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $res = $this->musicModel->getMusicByName($_GET['name']);
      echo json_encode($res);
    }
  }

  public function validateName($name)
  {
    if (empty($name))
      return 'Name field is empty';

    if (!ctype_alnum($name))
      return 'Name field must contain only Alphanumeric characters';

    return '';
  }

  public function validateYear($year)
  {
    if (empty($year))
      return 'Year field is empty';

    if (!is_numeric($year))
      return 'Year field must only contain Numeric characters';

    if ($year < 1950 || $year > 2020)
      return 'Year value must be between 1950 and 2020';

    return '';
  }

  public function validateGenre($genre)
  {
    if (empty($genre))
      return 'Genre field is empty';

    if (!in_array(strtolower($genre), array("pop", "jazz", "rock", "classic", "slow")))
      return 'Genre field must be one of the predefined Genres';

    return '';
  }

  public function validateUrl($url)
  {
    if (empty($url))
      return 'URL field is empty';

    if (!filter_var($url, FILTER_VALIDATE_URL))
      return 'Invalid URL';

    return '';
  }

  public function validateMusicians($musicians)
  {
    foreach ($musicians as $key => $musician) {
      if (empty($musician))
        return 'Musician field is empty';

      if (!ctype_alnum($musician))
        return 'Musicians fields must contain only Alphanumeric characters';
    }

    return '';
  }
}
