<?php

namespace Dumgum;

use Dumgum\Profile\FeatureNotFoundException;

class Profile {
  const FEATURE_EYES_COLOR = 'eyes_color';
  const FEATURE_HAIR_COLOR = 'hair_color';
  const FEATURE_HAIR_LENGTH = 'hair_length';
  const FEATURE_HEIGHT = 'height';
  const FEATURE_WEIGHT = 'weight';
  const FEATURE_MARITAL_STATUS = 'marital_status';

  const GENDER_MALE = 'male';
  const GENDER_FEMALE = 'female';
  const GENDER_COUPLE = 'couple';
  const GENDER_TRANSGENDER = 'transgender';
  const GENDER_​TRANSMAN = '​transman';
  const GENDER_TRANSWOMAN = 'transwoman';
  const GENDER_​TRANSVESTITE = '​transvestite';

  public $name;
  public $birthdate;
  public $gender;
  public $location;
  public $features;
  public $pictures;
  public $privatePictures;
  public $description;

  public function __construct() {
    $this->location = [
      'country' => null,
      'postal_code' => null,
      'city' => null
    ];
    $this->pictures = [];
    $this->privatePictures = [];
    $this->features = [
      self::FEATURE_EYES_COLOR => null,
      self::FEATURE_HAIR_COLOR => null,
      self::FEATURE_HAIR_LENGTH => null,
      self::FEATURE_HEIGHT => null,
      self::FEATURE_WEIGHT => null,
      self::FEATURE_MARITAL_STATUS => null
    ];
  }

  public function getName() {
    return $this->name;
  }

  public function getBirthdate() {
    return $this->birthdate;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getLocation() {
    return $this->location;
  }

  public function getFeatures() {
    return $this->features;
  }

  public function getPictures() {
    return $this->pictures;
  }

  public function getPrivatePictures() {
    return $this->privatePictures;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setName($value) {
    $this->name = $value;
    return $this;
  }

  public function setBirthdate($value) {
    $this->birthdate = $value;
    return $this;
  }

  public function setGender($value) {
    $this->gender = $value;
    return $this;
  }

  public function setLocation($country, $postalCode = null, $city = null) {
    $this->location = [
      'country' => $country,
      'postal_code' => $postalCode,
      'city' => $city
    ];
    return $this;
  }

  /**
   * Set a feature on Profile
   *
   * @param string $name
   * @param mixed $value
   */
  public function setFeature($name, $value) {
    if(!array_key_exists($name, $this->features)) {
      throw new FeatureNotFoundException($name);
    }

    $this->features[$name] = $value;
    return $this;
  }

  /**
   * Add a picture URL on Profile
   * @param string $url
   */
  public function addPicture($url) {
    array_push($this->pictures, $url);
    return $this;
  }

  /**
   * Add a private picture URL on Profile
   * @param string $url
   */
  public function addPrivatePicture($url) {
    array_push($this->privatePictures, $url);
    return $this;
  }

  public function setDescription($value) {
    $this->description = $value;
    return $this;
  }

  public function asJSON() {
    return [
      'name' => $this->getName(),
      'birthdate' => $this->getBirthdate(),
      'gender' => $this->getGender(),
      'location' => $this->getLocation(),
      'features' => $this->getFeatures(),
      'pictures' => $this->getPictures(),
      'private_pictures' => $this->getPrivatePictures(),
      'description' => $this->getDescription()
    ];
  }
}
