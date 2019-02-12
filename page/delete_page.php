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

if(isset($_GET['delete_song'])){

		$playlist_song_delete=$_GET['delete_song'];
		$id_playlist=$_GET['playlist'];

		$connect = mysqli_connect('localhost','root','', 'SpotIFA');

		$sql_e=
			"
			DELETE FROM playlist_content
			WHERE playlist_content.id_playlist = '".$id_playlist."'
			AND playlist_content.id_song = '".$playlist_song_delete."'
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