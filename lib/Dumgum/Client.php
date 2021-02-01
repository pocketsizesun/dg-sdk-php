<?php

namespace Dumgum;

class Client {
  public function __construct() {
    $this->endpointUrl = 'https://api.dumgum.com';
    $this->apiKey = getenv('DUMGUM_API_KEY');
  }

  public function setEndpointUrl($url) {
    $this->endpointUrl = $url;
  }

  public function setApiKey($apiKey) {
    $this->apiKey = $apiKey;
  }

  public function postJSON($path, $data, $headers = array()) {
    $headers = [
      'content-type: application/json',
      'dg-api-key: ' . $this->apiKey
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->endpointUrl . $path);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = HTTPResponse::fromCURL($ch);
    return $response;
  }

  public function get($path, $headers = array()) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->endpointUrl . $path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = [
      'content-type: application/json',
      'dg-api-key: ' . $this->apiKey
    ];

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $server_output = curl_exec($ch);

    curl_close($ch);

    return $server_output;
  }
}
