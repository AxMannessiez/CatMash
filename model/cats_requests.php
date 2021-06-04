<?php

function AddCat(PDO $db, string $id, string $url) {
	$add = $db->prepare("INSERT INTO Cats (id, url, ranking, votes) VALUES (?, ?, 1200, 0)");
	$add->execute(array($id, $url));
}