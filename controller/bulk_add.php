<?php 

require '../model/connexion.php';
require '../model/cats_requests.php';

// Get the json data from the url
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			// Get the result as string instead of diplaying it
curl_setopt($ch, CURLOPT_URL, 'https://latelier.co/data/cats.json');
$data = curl_exec($ch);
curl_close($ch);

// Decode json as an associative array
$cats_images = json_decode($data, true)["images"];

foreach ($cats_images as $cat) {
	AddCat($db, $cat["id"], $cat["url"]);
}

echo("The cats from the json file have been added.");