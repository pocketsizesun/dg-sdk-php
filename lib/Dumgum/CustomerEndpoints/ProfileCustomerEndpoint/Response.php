<?php

namespace Dumgum\CustomerEndpoints\ProfileCustomerEndpoint;

class Response {
  public $profile;
  public $profileTTL;
  public $profileVersion;

  public function setProfile($profile) {
    $this->profile = $profile;
  }

  public function setProfileTTL($ttl) {
    $this->profileTTL = $ttl;
  }

  public function setProfileVersion($version) {
    $this->profileVersion = $version;
  }

  public function getProfile() {
    return $this->profile;
  }

  public function getProfileTTL() {
    return $this->profileTTL;
  }

  public function getProfileVersion() {
    return $this->profileVersion;
  }

  public function asJSON() {
    return [
      'profile_ttl' => $this->getProfileTTL(),
      'profile_version' => $this->getProfileVersion(),
      'profile' => $this->getProfile()->asJSON()
    ];
  }

  public function toJSON() {
    return json_encode($this->asJSON());
  }
}
