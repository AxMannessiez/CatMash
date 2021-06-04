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