<?php

require 'model/connexion.php';
require 'model/cats_requests.php';

// If we just have submitted a vote
if (isset($_POST['chosen_cat'],$_POST['first_cat_id'],$_POST['second_cat_id'])){
	if ($_POST['chosen_cat']==1){
		$winner_id = $_POST['first_cat_id'];
		$loser_id = $_POST['second_cat_id'];
	}
	else{
		$winner_id = $_POST['second_cat_id'];
		$loser_id = $_POST['first_cat_id'];
	}

	// We use the Elo rating system :

	$K = 30;

	$winner_rating = GetRatingFromCatId($db, $winner_id);
	$loser_rating = GetRatingFromCatId($db, $loser_id);

	$winner_expected_score = 1 / (1+10**(($loser_rating-$winner_rating)/400));
	$loser_expected_score = 1 / (1+10**(($winner_rating-$loser_rating)/400));

	$winner_score = 1;
	$loser_score = 0;

	$updated_winner_rating = $winner_rating + $K*($winner_score-$winner_expected_score);
	$updated_loser_rating = $loser_rating + $K*($loser_score-$loser_expected_score);

	UpdateCatRating($db, $winner_id, $updated_winner_rating);
	UpdateCatRating($db, $loser_id, $updated_loser_rating);

	header('Location: index.php');
}
// If we come to the page to vote
else {
	$cat_number = GetCatNumber($db);		// Number of cats in the database

	// Choose randomly two different cats :
	$first_cat_id = random_int(1,$cat_number);		// random_int to have a cryptographically secure pseudo-random int
	do {
	  $second_cat_id = random_int(1,$cat_number);
	} while ($first_cat_id == $second_cat_id);

	$first_cat_url = GetCatFromId($db, $first_cat_id)["url"];
	$second_cat_url = GetCatFromId($db, $second_cat_id)["url"];

	$number_of_votes = GetVotesNumber($db)/2;

	include 'view/vote.php';
}

