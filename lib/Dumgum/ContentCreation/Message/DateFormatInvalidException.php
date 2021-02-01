<?php

namespace Dumgum\ContentCreation\Message;

use Dumgum\Exception;

class DateFormatInvalidException extends Exception {
  private $value;

  public function __construct($value) {
    parent::__construct(
      "Invalid date '${value}', accepted format are: 'ISO8601', 'timestamp' (in seconds) or 'DateTime' object"
    );
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
}
