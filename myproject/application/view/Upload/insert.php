<meta charset="UTF-8"> <!-- fyrir íslensk stafamengi -->
<title>Loading</title>

<?php
// sækja skrá sem geymir tengingu við gagnagrunn
require_once("connection.php");

if(session_status() == PHP_SESSION_NONE) session_start();
$userID = $_SESSION['authenticatedID'];
// erum hér að ná í playerinn úr forminu
$imageName = $_POST['imageName']; 	
// erum hér að ná í skorið úr forminu, ath tölugildi koma sem strengur frá input í formi.
$imagePath = $_POST['imagePath'];

//er hérna að athuga hvort breyturnar séu ekki tómar
if(!empty($imageName) && !empty($imagePath) && !empty($userID)) 
{
	// SQL skipun/fyrirspurnin - gott að athuga fyrst hvort hún sé rétt  með að skrifa í og prófa í phpmyadmin eða workbench 
	// hér erum við að nota placeholder (er með : á undan) fyrir gildi úr $_POST fylki.
	$sql = 'INSERT INTO Post(P_title, P_url, U_id)VALUES(:imageName,:imagePath,:userID)'; 
	
	// Prepare setning (e. statement) er sql fyrirspurn sem þú sendir til miðlara (e. server) áður en þú framkvæmir hana
	// þetta er gerir miðlaranum (MySQL) kleift að undirbúa sig fyrir keyrslu (kemur í veg árásir á gagnagrunn (SQL injection))
	// sql kóði ($sql) inniheldur "placeholder" sem mun geyma gildi þegar fyrirspurn er keyrð
	$q = $pdo->prepare($sql);

	try{
		// MySQL er núna tilbúið fyrir gildin í placeholders, 
		// Við sendum gildin með bindValue() aðferð sem PDOStatement object á ($q). 
		// Við köllum á þessa aðferð fyrir hvert og eitt gildi sem við sendum.
		// Þar sem MySQL veit á þessum tímapunkti að hann á von á gildi fremur en SQL kóða sem hann þarf ekki að þátta (e. parse)
		// þá komum við í veg fyrir að input frá notanda sé meðhöndlað sem SQL kóði (og keyrður) sem gæti hugsanlegt skemmt gagnagrunn okkar.
		$q->bindValue(':imageName',$imageName); // gildið í $player er sett í placeholder player og sent.
		$q->bindValue(':imagePath',$imagePath);
		$q->bindValue(':userID',$userID);

		// execute segir MySQL að framkvæma SQL kóða á gagnagrunn með gildunum.
		$q->execute();  
		echo "Það tókst að skrifa eftirfarandi upplýsingar í gagnagrunn<br>";
		echo "$imageName og $imagePath";
	}
	//
	catch (PDOException $ex){
		echo 'Það tókst ekki að skrifa í gagnagrunn: '.$ex->getMessage();
	}

}
?>