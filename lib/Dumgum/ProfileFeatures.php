<?php

namespace Dumgum;

class ProfileFeatures {
  public $hairColor;
  public $height;
  public $weight;
  public $eyesColor;
  public $hairLength;

  public function getHairColor() {
    return $this->hairColor;
  }

  public function getHeight() {
    return $this->height;
  }

  public function getWeight() {
    return $this->weight;
  }

  public function getEyesColor() {
    return $this->eyesColor;
  }

  public function getHairLength() {
    return $this->hairLength;
  }

  public function setHairColor($value) {
    $this->hairColor = $value;
  }

  public function setHeight($value) {
    $this->height = $value;
  }

  public function setWeight($value) {
    $this->weight = $value;
  }

  public function setEyesColor($value) {
    $this->eyesColor = $value;
  }

  public function setHairLength($value) {
    $this->hairLength = $value;
  }

  public function asJSON() {
    return [
      'height' => $this->getHairColor(),
      'weight' => $this->getHeight(),
      'eyes_color' => $this->getWeight(),
      'hair_color' => $this->getEyesColor(),
      'hair_length' => $this->getHairLength()
    ];
  }

  public function toJSON() {
    return json_encode($this->asJSON());
  }
}
