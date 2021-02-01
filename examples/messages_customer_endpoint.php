<?php

require 'vendor/autoload.php';

use Dumgum\ContentCreation\Message;

$messagesCustomerEndpointResponse = new Dumgum\CustomerEndpoints\MessagesCustomerEndpoint\Response();

for($i = 0; $i < 10; $i++) {
  $message = new Message();
  $message->setSenderId('1234')
          ->setType(Message::TYPE_TEXT)
          ->setDate(strtotime("-${i} minutes"))
          ->setBody('hello world ' . $i);

  $messagesCustomerEndpointResponse->addMessage($message);
}

echo $messagesCustomerEndpointResponse->toJSON();
