<?php
class Musicians extends Controller
{
  public function __construct()
  {
    $this->musicianModel = $this->model('Musician');
  }

  public function get()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $response = $this->musicianModel->getMusicians();

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
        'band' => $_POST['band']
      ];

      $response->nameErr = $this->validateName($data['name']);
      $response->bandErr = $this->validateBand($data['band']);


      if (
        $response->nameErr == '' &&
        $response->bandErr == ''
      ) {
        if ($this->musicianModel->addMusician($data)) {
          $response->status = '200';
        } else {
          $response->status = '400';
        }
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
        'band' => $_POST['band']
      ];

      $response->idErr = $this->validateId($data['id']);
      $response->nameErr = $this->validateName($data['name']);
      $response->bandErr = $this->validateBand($data['band']);


      if (
        $response->idErr == '' &&
        $response->nameErr == '' &&
        $response->bandErr == ''
      ) {

        if ($this->musicianModel->modifyMusicianById($data)) {
          $response->status = '200';
        } else {
          $response->status = '400';
        }
      } else {
        $response->status = '400';
      }

      echo json_encode($response);
    }
  }

  public function delete()
  {
    $response = (object) [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'name' => $_POST['name']
      ];

      $response->nameErr = $this->validateName($data['name']);



      if (
        $response->nameErr == ''
      ) {

        if ($this->musicianModel->getMusicianByName($data['name'])) {
          if ($this->musicianModel->deleteMusicianByName($data['name'])) {
            $response->status = '200';
          } else {
            $response->status = '400';
          }
        } else {
          $response->nameErr = "Musician don't exist";
          $response->status = '400';
        }
      } else {
        $response->status = '400';
      }

      echo json_encode($response);
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

  public function validateBand($band)
  {
    if (empty($band))
      return 'Band field is empty';

    if (!ctype_alnum($band))
      return 'Band field must contain only Alphanumeric characters';

    return '';
  }

  public function validateId($id)
  {
    if (!is_numeric($id))
      return 'ID field must contain only Numeric characters';

    return '';
  }
}
