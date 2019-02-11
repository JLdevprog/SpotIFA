<?php

session_start();

echo "<a href='playlist_page.php' >Return</a><br>";


if(isset($_GET['delete'])){

		$playlist_delete=$_GET['delete'];

		$connect = mysqli_connect('localhost','root','', 'SpotIFA');

		$sql_e=
			"
			DELETE FROM playlists 
			WHERE playlists.id_playlist = '".$playlist_delete."' 
			";

		if (!$connect) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		elseif (mysqli_query($connect, $sql_e) && $_SESSION['user']!=NULL) {

		    echo "Deleted?!<br>";

		} 

		else {
		    echo "Error?!";
		}


	}

	else{
	}


?>