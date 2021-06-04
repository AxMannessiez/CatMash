<?php

// Queries concerning the Cats table

/**
 * Add a Cat to the table
 * @param PDO $db
 * @param string $id
 * @param string $url
 * @return array
 */
function AddCat(PDO $db, string $id, string $url): array {
	$add = $db->prepare("INSERT INTO Cats (name, url, rating, votes) VALUES (?, ?, 1200, 0)");
	$add->execute(array($id, $url));
}

/**
 * Get the total cats number (the size of the Cats table)
 * @param PDO $db
 * @return int
 */
function GetCatNumber(PDO $db): int {
	$query = $db->prepare("SELECT COUNT(id) as size FROM Cats");
	$query->execute();
	return $query->fetch()["size"];
}

/**
 * Get the cat corresponding to a given id
 * @param PDO $db
 * @param int $id
 * @return array
 */
function GetCatFromId(PDO $db, int $id): array {
	$query = $db->prepare("SELECT * FROM Cats WHERE id = ?");
	$query->execute(array($id));
	return $query->fetch();
}

/**
 * Get the total number of votes
 * @param PDO $db
 * @return int
 */
function GetVotesNumber(PDO $db): int {
	$query = $db->prepare("SELECT SUM(votes) as number FROM Cats");
	$query->execute();
	return $query->fetch()["number"];
}

/**
 * Get the rating of a cat
 * @param PDO $db
 * @param int $id
 * @return float
 */
function GetRatingFromCatId(PDO $db, int $id): float {
	$query = $db->prepare("SELECT rating FROM Cats WHERE id = ?");
	$query->execute(array($id));
	return $query->fetch()['rating'];
}


/**
 * Update the rating of a cat
 * @param PDO $db
 * @param int $id
 * @param float $rating
 */
function UpdateCatRating(PDO $db, int $id, float $rating) {
	// Update the rating with the new one
	$updateRating = $db->prepare('UPDATE Cats SET rating=? WHERE id=?');
	$updateRating->execute(array($rating, $id));
	// Update the number of wotes, incrementing it
	$updateVoteNumber = $db->prepare('UPDATE Cats SET votes = votes + 1 WHERE id=?');
	$updateVoteNumber->execute(array($id));
}