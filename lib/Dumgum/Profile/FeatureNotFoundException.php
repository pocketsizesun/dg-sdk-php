<?php

namespace Dumgum\Profile;

use Dumgum\Exception;

class FeatureNotFoundException extends Exception {
  public function __construct($featureName) {
    parent::__construct("Profile feature '${featureName}' does not exists");
  }
}
