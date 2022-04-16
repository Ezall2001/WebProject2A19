<?php

class Controller
{

  public function model($model)
  {
    require_once '../server/models/' . $model . '.php';

    return new $model();
  }

  public function view($view, $data = [])
  {
    if (file_exists('../server/views/' . $view . '.php')) {
      require_once '../server/views/' . $view . '.php';
    } else {
      die("view does not exist");
    }
  }
}
