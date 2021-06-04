<?php

require 'model/connexion.php';
require 'model/cats_requests.php';

require 'controller/paging_functions.php';

$cat_number = GetCatNumber($db);
$max_page = ceil($cat_number/15);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$page = GetRealPage($page, $max_page);

$start_index = (int) $page * 15 - 15 + 1;
$top = GetCatsRanking($db, $page);

include 'view/ranking.php';