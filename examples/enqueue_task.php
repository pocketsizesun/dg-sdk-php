<?php

require 'vendor/autoload.php';

$client = new Dumgum\ContentCreation\Client();
$client->setEndpointUrl('https://api-staging.dumgum.com');
$client->setApiKey('AXXXXX.XXXXXXXXXXXXXXXXXXXXXX');

try {
  $message = new Dumgum\ContentCreation\Message();
  $message->setType(Dumgum\ContentCreation\Message::TYPE_TEXT);
  $message->setDate(time());
  $message->setBody('hello world');

  $task = new Dumgum\ContentCreation\Task();
  $task->setAnimatedProfileId('528');
  $task->setCustomerProfileId('6128');
  $task->setCustomerProfileDistance(28);
  $task->setPriority(Dumgum\ContentCreation\Task::PRIORITY_NORMAL);
  $task->setLanguage(Dumgum\ContentCreation\Task::LANGUAGE_FRENCH);
  $task->setMessage($message);

  $client->enqueueTask($task);
} catch(\Dumgum\Exception $e) {
  var_dump($e);
}
