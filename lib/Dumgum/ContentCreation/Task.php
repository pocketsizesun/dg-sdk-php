<?php

namespace Dumgum\ContentCreation;

class Task {
  const LANGUAGE_FRENCH = 'FR';

  const PRIORITY_NORMAL = 'NORMAL';
  const PRIORITY_FAST = 'FAST';
  const PRIORITY_INSTANT = 'INSTANT';

  public $animatedProfileId = null;
  public $animatedProfileVersion = null;
  public $customerProfileDistance = null;
  public $customerProfileId = null;
  public $customerProfileVersion = null;
  public $priority = null;
  public $message = null;
  public $language = null;

  public function __construct() {
    $this->priority = self::PRIORITY_NORMAL;
    $this->language = self::LANGUAGE_FRENCH;
  }

  public function getAnimatedProfileId() {
    return $this->animatedProfileId;
  }

  public function getAnimatedProfileVersion() {
    return $this->animatedProfileVersion;
  }

  public function getCustomerProfileDistance() {
    return $this->customerProfileDistance;
  }

  public function getCustomerProfileId() {
    return $this->customerProfileId;
  }

  public function getCustomerProfileVersion() {
    return $this->customerProfileVersion;
  }

  public function getPriority() {
    return $this->priority;
  }

  /**
   * @return \Dumgum\ContentCreation\Message|null
   */
  public function getMessage() {
    return $this->message;
  }

  public function getLanguage() {
    return $this->language;
  }

  public function setAnimatedProfileId($profileId) {
    $this->animatedProfileId = $profileId;
  }

  public function setAnimatedProfileVersion($version) {
    $this->animatedProfileVersion = $version;
  }

  public function setCustomerProfileDistance($distance) {
    $this->customerProfileDistance = intval($distance);
  }

  public function setCustomerProfileId($profileId) {
    $this->customerProfileId = $profileId;
  }

  public function setCustomerProfileVersion($version) {
    $this->customerProfileVersion = $version;
  }

  public function setPriority($priority) {
    $this->priority = $priority;
  }

  /**
   * @param \Dumgum\ContentCreation\Message $message
   */
  public function setMessage($message) {
    $this->message = $message;
  }

  public function setLanguage($language) {
    $this->language = $language;
  }

  public function asJSON() {
    $json = [
      'animated_profile_id' => $this->getAnimatedProfileId(),
      'customer_profile_id' => $this->getCustomerProfileId(),
      'priority' => $this->getPriority(),
      'language' => $this->getLanguage()
    ];

    if(!is_null($this->getMessage())) {
      $json['message'] = [
        'type' => $this->getMessage()->getType(),
        'date' => $this->getMessage()->getFormattedDate(),
        'body' => $this->getMessage()->getBody()
      ];
    }

    if(!is_null($this->getCustomerProfileDistance())) {
      $json['customer_profile_distance'] = $this->getCustomerProfileDistance();
    }

    return $json;
  }
}
