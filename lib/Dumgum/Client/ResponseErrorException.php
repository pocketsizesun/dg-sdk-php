<?php

namespace Dumgum\Client;
use Dumgum\Exception;

class ResponseErrorException extends Exception {
  private $response;

  public function __construct($response) {
    parent::__construct(
      'An error has occured when enqueuing task',
      [
        'response_code' => $response->getStatusCode(),
        'response_headers' => $response->getHeaders(),
        'response_body' => $response->getBody()
      ]
    );
    $this->response = $response;
  }

  public function getResponse() {
    return $this->response;
  }
}
