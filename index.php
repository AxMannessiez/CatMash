<?php

require 'model/connexion.php';
require 'model/cats_requests.php';

$cat_number = GetCatNumber($db);		// Number of cats in the database

// Choose randomly two different cats :
$first_cat_id = random_int(1,$cat_number);		// random_int to have a cryptographically secure pseudo-random int
do {
  $second_cat_id = random_int(1,$cat_number);
} while ($first_cat_id == $second_cat_id);

$first_cat_url = GetCatFromId($db, $first_cat_id)["url"];
$second_cat_url = GetCatFromId($db, $second_cat_id)["url"];

include 'view/vote.php';