<?php

/**
* The tickers controller
*/

class TickersController
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
