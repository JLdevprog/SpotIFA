<?php

function db_connect(){
			$connect = mysqli_connect('localhost','root','', 'SpotIFA');
			return $connect;
	}

function db_connect_pdo(){
	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root','',
				array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
	return $db_spot;
}

$connect = db_connect();

$db_spot = db_connect_pdo();



?>