<?php

/**
* The home page controller
*/

class IndexController
{
  /** @var Object */
  private $model;

  function __construct($model)
  {
    $this->model = $model;
  }

  public function index()
  {
    return $this->model->render();
  }
}
