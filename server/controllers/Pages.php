<?php

class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $this->view('pages/index', [
      'pageName' => 'home',
      'styles' => ['global', 'home'],
      'js' => ['home']
    ]);
  }

  public function music()
  {
    $this->view('pages/music', [
      'admin' => false,
      'pageName' => 'music',
      'styles' => ['global', 'music'],
      'js' => ['music']
    ]);
  }

  public function admin()
  {
    $this->view('pages/admin', [
      'admin' => true,
      'pageName' => 'admin',
      'styles' => ['global', 'admin'],
      'js' => ['admin']
    ]);
  }
}
