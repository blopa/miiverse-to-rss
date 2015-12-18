<?php header("Content-Type: application/xml; charset=ISO-8859-1"); ?>
<?php
	$apicode = $_GET["apicode"];
	$apikey = $_GET["apikey"];
	$jsonLink = "https://www.kimonolabs.com/api/" . $apicode . "?apikey=" . $apikey;
	$string = file_get_contents($jsonLink);
	$json_a = json_decode($string, true);
	echo '<rss version="2.0">';
	echo "<channel>";
	echo "<title>Miiverse Posts</title>";
	$i = 1;
	foreach ($json_a["results"]["collection1"] as $data){
	   echo "<item>";
	   echo "<title>" . "Miiverse Post #" . $i . "</title>";
	   echo "<description>" . $data["post-text"] . "</description>";
	   echo "<link>" . $data["post-image"]["src"] . "</link>";
	   echo "</item>";
	   $i++;
	}
	echo "</channel>";
	echo "</rss>";
?>