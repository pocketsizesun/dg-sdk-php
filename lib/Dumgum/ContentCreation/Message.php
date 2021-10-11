<?php

namespace Dumgum\ContentCreation;

use Dumgum\ContentCreation\Message\DateFormatInvalidException;

class Message {
  const TYPE_TEXT = 'text';
  const TYPE_ACTION_KISS = 'action:kiss';
  const TYPE_ACTION_REQUEST_PICTURE = 'action:request-picture';
  const TYPE_ACTION_FAVORITE = 'action:favorite';
  const TYPE_CC_PRIVATE_PICTURE = 'cc:PrivatePicture';

  public $senderId = null;
  public $type = null;
  public $date = null;
  public $body = null;

  public function __construct() {
    $this->date = new \DateTime;
  }

  public function getType() {
    return $this->type;
  }

  public function getDate() {
    return $this->date;
  }

  public function getBody() {
    return $this->body;
  }

  public function getSenderId() {
    return $this->senderId;
  }

  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  public function setDate($value) {
    switch(gettype($value)) {
      case 'string':
        $this->date = \DateTime::createFromFormat(\DateTime::ISO8601, $value);
        if (!($this->date instanceof \DateTime)) {
          throw new DateFormatInvalidException($value);
        }
        break;

      case 'integer':
        $this->date = \DateTime::createFromFormat('U', $value);
        return $this;
        break;

      case 'object':
        if ($value instanceof \DateTime) {
          $this->date = $value;
        } else {
          throw new DateFormatInvalidException($value);
        }
        break;
    }

    return $this;
  }

  public function setBody($body) {
    $this->body = $body;
    return $this;
  }

  public function setSenderId($senderId) {
    $this->senderId = $senderId;
    return $this;
  }

  public function getFormattedDate() {
    return $this->date->format(\DateTime::ISO8601);
  }

  public function asJSON() {
    $json = [
      'type' => $this->type,
      'date' => $this->getFormattedDate(),
      'body' => $this->getBody()
    ];

    if(!is_null($this->getSenderId())) {
      $json['sender_id'] = $this->getSenderId();
    }

    return $json;
  }
}
