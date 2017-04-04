<?php
try{

	# Hér þarf að breyta dbname, notendanafni og lykilorði
	$source = 'mysql:host=127.0.0.1;dbname=v4';
	$user = 'root';
	$password = 'realshit';

	# tegund og nafn á server, nafn á db og aðgangur
	$pdo = new PDO($source, $user, $password);

	# stillum hann af hvernig hann með höndlar villur
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	# Við getum notað exec fyrir INSERT; UPDATE og DELETE
	#  notum utf-8 og gerum það með SQL fyrirspurn exec sendir sql fyrirspurnir til database
	$pdo->exec('SET NAMES "utf8"');

}
catch (PDOException $e){
	
	#skemmtilegri skilaboð til notanda sjá kóða t.d. bls. 99
	echo "tenging tókst ekki". "<br>" . $e->getMessage();
	
}
?>