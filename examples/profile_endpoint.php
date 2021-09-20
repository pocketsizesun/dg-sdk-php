<?php

require 'vendor/autoload.php';

$profileCustomerEndpointResponse = new Dumgum\CustomerEndpoints\ProfileCustomerEndpoint\Response();

$profile = new Dumgum\Profile();
$profile->setName('Roger')
        ->setBirthdate('1991-03-12')
        ->setGender(Dumgum\Profile::GENDER_MALE)
        ->setLocation('FR', '75001', 'Paris')
        ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec mollis mi. Vivamus luctus neque eros, non viverra velit luctus.')
        ->setFeature(Dumgum\Profile::FEATURE_EYES_COLOR, 'blue')
        ->setFeature(Dumgum\Profile::FEATURE_HAIR_COLOR, 'red')
        ->setFeature(Dumgum\Profile::FEATURE_HAIR_LENGTH, 'short')
        ->setFeature(Dumgum\Profile::FEATURE_HEIGHT, 170)
        ->setFeature(Dumgum\Profile::FEATURE_WEIGHT, 65)
        ->addPicture('https://www.vettedpetcare.com/vetted-blog/wp-content/uploads/2017/09/How-To-Travel-With-a-Super-Anxious-Cat-square.jpeg');

$profileCustomerEndpointResponse->setCacheTTL(60);
$profileCustomerEndpointResponse->setCacheVersion('123456789');
$profileCustomerEndpointResponse->setProfile($profile);

echo $profileCustomerEndpointResponse->toJSON();
