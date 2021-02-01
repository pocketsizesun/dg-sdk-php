<?php

namespace Dumgum\CustomerEndpoints\MessagesCustomerEndpoint;
use Dumgum\ContentCreation\Message;

class Response {
  public $messages;

  public function __construct() {
    $this->messages = [];
  }

  public function addMessage(Message $message) {
    array_push($this->messages, $message);
  }

  public function asJSON() {
    $messages = array_merge([], $this->messages);
    usort($messages, function($a, $b) {
      return $a->getDate() <=> $b->getDate();
    });
    $messages = array_map(function($message) {
      return $message->asJSON();
    }, $messages);

    return [
      'messages' => $messages
    ];
  }

  public function toJSON() {
    return json_encode($this->asJSON());
  }
}
