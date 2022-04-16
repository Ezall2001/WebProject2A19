<?php
class Core
{
  protected $currController = 'Pages';
  protected $currMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->getUrl();

    if (isset($url[0])) {
      if (file_exists('../server/controllers/' . ucwords($url[0]) . '.php')) {
        $this->currController = ucwords($url[0]);
        unset($url[0]);
      }
    }

    require_once '../server/controllers/' . $this->currController . '.php';
    $this->currController = new $this->currController;

    if (isset($url[1])) {
      if (method_exists($this->currController, $url[1])) {
        $this->currMethod = $url[1];
        unset($url[1]);
      }
    }

    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->currController, $this->currMethod], $this->params);
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
