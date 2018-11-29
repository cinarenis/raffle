<?php 

try {
	$db = new PDO("mysql:host=localhost;dbname=raffle;charset=utf8",'root','Op3l5hj109xe');
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>