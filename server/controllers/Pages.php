<?php

class Pages extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    $this->view('pages/index', [
      'styles' => ['global', 'home'],
      'js' => ['home']
    ]);
  }

  public function music()
  {
    $this->view('pages/music', [
      'styles' => ['global', 'music'],
      'js' => []
    ]);
  }
}
