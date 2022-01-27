<?php

/**
* The home page model
*/
class IndexModel
{
  /** @var string */
  private $message = "
  <h1>Welcome to the KMS API.</h1><br>
  <p>This is a simple API created using an MVC approach.<br>
  Using an MVC approach, this API can be set up with endless endpoints.
  </p>
  ";

  public function render()
  {
    return $this->message;
  }
}
