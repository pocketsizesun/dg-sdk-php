<?php

namespace Dumgum;

class HTTPResponse {
  private $code = null;
  private $headers = null;
  private $body = null;

  public static function fromCURL($resource) {
    $responseData = curl_exec($resource);
    $headerSize = curl_getinfo($resource, CURLINFO_HEADER_SIZE);
    $headerData = substr($responseData, 0, $headerSize);
    $body = substr($responseData, $headerSize);

    $response = new self();
    $response->setStatusCode(curl_getinfo($resource, CURLINFO_RESPONSE_CODE));
    $response->setHeaders(self::parseHeaders($headerData));
    $response->setBody($body);
    curl_close($resource);
    return $response;
  }

  public static function parseHeaders($data) {
    $lines = explode("\r\n", trim($data));
    array_shift($lines);
    $headers = [];
    foreach($lines as $line) {
      $lineSplit = explode(':', $line, 2);
      $headers[$lineSplit[0]] = trim($lineSplit[1]);
    }
    return $headers;
  }

  public function __construct() {
  }

  public function setStatusCode($code) {
    $this->code = $code;
  }

  public function getStatusCode() {
    return $this->code;
  }

  public function setHeaders($headers) {
    $this->headers = $headers;
  }

  public function getHeaders() {
    return $this->headers;
  }

  public function setBody($body) {
    $this->body = $body;
  }

  public function getBody() {
    return $this->body;
  }
}
