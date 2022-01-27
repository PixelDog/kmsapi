<?php

/**
* The home page view
*/
class IndexView
{

  private $model;

  private $controller;

  private $html;

  function __construct($controller, $model)
  {
    $this->controller = $controller;

    $this->model = $model;

  }

  public function index()
  {
    return $this->controller->index();
  }

}
