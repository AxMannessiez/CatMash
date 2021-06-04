<?php

require 'model/connexion.php';
require 'model/cats_requests.php';

$cat_number = GetCatNumber($db);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_index = (int) $page * 15 - 15 + 1;
$top = GetCatsRanking($db, $page);

include 'view/ranking.php';