<?php

namespace Dumgum\ContentCreation;

use Dumgum\Client\ResponseErrorException;

class Client extends \Dumgum\Client {
  /**
   * @param \Dumgum\ContentCreation\Task $task
   * @throws \Dumgum\Exception
   * @return bool
   */
  public function enqueueTask(\Dumgum\ContentCreation\Task $task) {
    $response = $this->postJSON(
      "/v1/content_creation/enqueue/conversation", $task->asJSON()
    );

    if ($response->getStatusCode() != 204) {
      throw new ResponseErrorException($response);
    }

    return true;
  }
}
