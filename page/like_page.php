<?php

session_start();

echo "<a href='song_page.php' >Return</a><br>";


if(isset($_GET)){

	if(isset($_GET['add'])){

		$like_id=$_GET['add'];


		$connect = mysqli_connect('localhost','root','', 'SpotIFA');


		$sql_w=
			"
			INSERT INTO likes (ref_user, id_song)
			VALUES('".$_SESSION['id']."', '".$like_id."')
			";


			if (!$connect) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			elseif (mysqli_query($connect, $sql_w) && $_SESSION['user']!=NULL) {

			    echo "You like it<br> & You Know it !?! <br> ;)<br>";

			} 

			else {
			    echo "Error?!";
			}

	}

	elseif(isset($_GET['del'])){

		$unlike_id=$_GET['del'];

		$connect = mysqli_connect('localhost','root','', 'SpotIFA');

		$sql_e=
			"
			DELETE FROM likes 
			WHERE likes.ref_user='".$_SESSION['id']."' 
			AND likes.id_song='".$unlike_id."'
			";

		if (!$connect) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		elseif (mysqli_query($connect, $sql_e) && $_SESSION['user']!=NULL) {

		    echo "You Unliked it ?!<br>& Get Bored...";

		} 

		else {
		    echo "Error?!";
		}
	}

}


?>