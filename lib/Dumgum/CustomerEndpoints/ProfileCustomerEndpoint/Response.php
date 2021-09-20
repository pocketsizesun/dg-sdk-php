<?php

namespace Dumgum\CustomerEndpoints\ProfileCustomerEndpoint;

class Response {
  public $profile;
  public $cacheTTL;
  public $cacheVersion;

  /**
   * @return $this
   */
  public function setProfile($profile) {
    $this->profile = $profile;
    return $this;
  }

  /**
   * @return $this
   */
  public function setCacheTTL($ttl) {
    $this->cacheTTL = $ttl;
    return $this;
  }

  /**
   * @deprecated
   * @return $this
   */
  public function setProfileTTL($ttl) {
    return $this->setCacheTTL($ttl);
  }

  /**
   * Set cache version
   * @return $this
   */
  public function setCacheVersion($version) {
    $this->cacheVersion = $version;
    return $this;
  }

  /**
   * Set cache version
   * @deprecated
   * @return $this
   */
  public function setProfileVersion($version) {
    return $this->setCacheVersion($version);
  }

  /**
   * Return attached profile
   * @return Dumgum\ContentCreation\Profile
   */
  public function getProfile() {
    return $this->profile;
  }

  /**
   * Return cache TTL
   * @return int
   */
  public function getCacheTTL() {
    return $this->cacheTTL;
  }

  /**
   * Return cache TTL
   * @deprecated
   * @return int
   */
  public function getProfileTTL() {
    return $this->getCacheTTL();
  }

  /**
   * Return cache version
   * @return string
   */
  public function getCacheVersion() {
    return $this->cacheVersion;
  }

  /**
   * Return cache version
   * @deprecated
   * @return string
   */
  public function getProfileVersion() {
    return $this->getCacheVersion();
  }

  public function asJSON() {
    return [
      'cache_ttl' => $this->getCacheTTL(),
      'cache_version' => $this->getCacheVersion(),
      'profile' => $this->getProfile()->asJSON()
    ];
  }

  public function toJSON() {
    return json_encode($this->asJSON());
  }
}
