<?php

function db_connect(){
			$connect = mysqli_connect('localhost','root','Admin.123', 'SpotIFA');
			return $connect;
	}

function db_connect_pdo(){
	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root','Admin.123',
				array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
	return $db_spot;
}

$connect = db_connect();

$db_spot = db_connect_pdo();


/*
function error_state(){

}

set_error_handler(error_handler)


try {
	$er_msg="Error Message!";
	trow new exception($er_msg);
}
*/

?>