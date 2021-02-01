<?php

namespace Dumgum;

class Exception extends \Exception {
  private $data;

  public function __construct($message, $data = []) {
    parent::__construct($message);
    $this->data = $data;
  }

  public function getData() {
    return $this->data;
  }
}
