<?php

session_start();

echo "<a href='playlist_page.php' >Return</a><br>";


if(isset($_POST['playlist'])){

		echo $_POST['playlist']."<br>";

		$playlist_name=$_POST['playlist'];


		$connect = mysqli_connect('localhost','root','', 'SpotIFA');


		$sql_w=
			"
			INSERT INTO playlists (id_playlist, name, creation_date, ref_user)
			VALUES(NULL, '".$playlist_name."', NOW(), '".$_SESSION['id']."')
			";


			if (!$connect) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			elseif (mysqli_query($connect, $sql_w) && $_SESSION['user']!=NULL) {

			    echo "Playlist created<br>";

			} 

			else {
			    echo "Error?!";
			}

	}


?>