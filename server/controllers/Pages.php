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
      'admin' => true,
      'pageName' => 'music',
      'styles' => ['global', 'music'],
      'js' => ['music']
    ]);
  }
}
