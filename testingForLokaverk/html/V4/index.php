<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	#containerinn{
		border: 5px solid black;
		padding: 5px;
		}
	#containerinn div{
		border: 5px solid black;
		padding: 5px;
		}
	.muh{float: left;}
	</style>
</head>
<body>
<div id="containerinn">
	<div>
	<h3>1:</h3>
	<p>PDO sendur fyrir PHP Data Objects. PDO bíður upp á API. PDO gerir þér kleift að vinna með Objecta. </p>
	<p><a href="https://www.sitepoint.com/re-introducing-pdo-the-right-way-to-access-databases-in-php/">Auglising</a></p>
</div>
<div>
	<h3>2:</h3>
	<pre>$connection = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8',
'root', 'root');
</pre>
<p>PDO er klassi, þú ert að búa til eintak af klassa sem er með smið sem tekur á móti host, database Name, Username, Password, og fleira</p>
</div>
<div>
	<h3>3:</h3>
	<p>Connection er enþá eintak af klassanum PDO og hann var með aðferð sem hét "exec"(stutt fyrir execute), þessi aðferð sendi sql command til serversins.</p>
	<p>hún skilar updataða breitinguni, sem dæmi: ef þú eiðir dálkum úr db skilar því hversu mörgum dálkum voru eit</p>
</div>
<div>
	<h3>4:</h3>
	<p>$multyDementionalKeyValueArray=$eintakAfPDO->queary($sqlSelectSkipun).//Key-value array er skilað frá PDO skipunini</p>
</div>
<div>
	<h3>5:</h3>
	<p>PDOStatement er extended klassi frá PDO. þetta er bara nettur klassi með fullt að þægilegum aðferðum til að vinna með upplýsingar frá gagnagrunni</p>
	<pre>
$stmt = $connection->prepare('SELECT name, colour, calories FROM fruit');
$stmt->execute();
$stmt->bindColumn(1, $name);
$stmt->bindColumn(2, $colour);
$stmt->bindColumn('calories', $cals);
    </pre>
</div>
<div>
<h3>6:</h3>
<p>Array þar sem index er í tölum 0 og upp</p>
</div>
<div>
	<h3>7:</h3>
	<p> PDO::FETCH_CLASS  er bara mjög skrítin leið til að sækja upplýsingar í klassa formati.(ég ség ekki alveg tilgangin)</p>
</div>
<div>
	<h3>8:</h3>
	<pre>$sth = $dbh->prepare("SELECT name, colour FROM fruit");//breitan sth verður sql skipun tilbúin að keira á gagnagrun
$sth->execute();//keyrir sql skipun
$result = $sth->fetchColumn(1);//breitan $result fær gildið true eða false eftir því hvort dálkurinn er til</pre>
</div>
<div>
	<h3>9:<a href="http://php.net/manual/en/pdostatement.bindvalue.php">þessu dæmi var stolið</a></h3>
	<p>prepere undirbír sql skipunina til að vera keirða af execue(). Til að koma í veg fyrir að SQL sé að droppa einhverju í kóðan sem maður vill ekki.</p>
</div>
<div>
	<h3>10:</h3>
	<p>þetta selectar alla ávexti sem eru rauðir og með færri kaloríur en 150.</p>
	<pre>
$calories = 150;						//breita með gildið 150
$colour = 'red';						//breita með gildið 'red'
$sth = $dbh->prepare('SELECT name, colour, calories		//sql select, valið nafn og caloríur
FROM fruit							//frá töfluni "fruit"
WHERE calories < :calories AND colour = :colour');		//einúngis valið dálkana þar sem caloríur eru færi en X og liturinn er Y
$sth->bindValue(':calories', $calories, PDO::PARAM_INT);	//X fær gildið frá breituni "$calories" sem tala(int)
$sth->bindValue(':colour', $colour, PDO::PARAM_STR);		//Y fær gildið frá breituni "$colour" sem texti(streingur/string)
$sth->execute();						//sql skipunin er keirð eftir að X og Y hafa verið fillt út

	</pre>
</div>
</div>
<?php
	include "dbcon.php";
	include "query.php";

	# birtir töflu með player og score
	foreach ($highscores as $entry) {
		echo '<div class="muh">'.$entry[1].'<br><img src="'.$entry[0].'" width="200px" height="auto"></div>';
	}
?>
<form action="insert.php" method="post">
		<label>Name: </label>
		<input type="text" name="nafn" required ><br>
		
		<label>URL: </label>
		<input type="text" name="URL" required ><br>

		<input type="submit">
	</form>
</body>
</html>