<?php

session_start();

include "../function/function.php";


echo "<a href='song_page.php' >Return to Songs</a><br>";


if(isset($_GET)){

	if(isset($_GET['add'])){

		$like_id=$_GET['add'];

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


	elseif(isset($_GET['add_playlist'])){

		echo "Or<br>Add to : ";

			$db_playlist = mysqli_query($connect,
						'
						SELECT 
						playlists.id_playlist as id_playlist,
						playlists.name as name,
						playlists.creation_date as creation_date,
						playlists.ref_user as ref_user

						FROM playlists

						INNER JOIN users ON playlists.ref_user=users.ref_user

						'
					);


			echo "<hr>";


			if($_SESSION){

				$id_song=$_GET['add_playlist'];

				while($data=mysqli_fetch_assoc($db_playlist)){

						if($_SESSION['id']==$data['ref_user']){

							echo "<br>";

							echo '<a href="playlist_add_page.php?add_playlist='
							.$id_song.
							'&add_playlist_to='.$data['id_playlist'].
					        '">'.$data['name']."</a>";

					        echo "<br><br><hr>";

					    }

			   	}

			   	if(isset($_GET['add_playlist_to'])){


					$id_playlist=$_GET['add_playlist_to'];

			   		mysqli_query($connect, 
						'
						INSERT INTO playlist_content (id_playlist, id_song)
						VALUES ("'.$id_playlist.'" , "'.$id_song.'")
						'
					);

					Echo "Music Add";

					echo '<br><a href="playlist_sheet.php?playlist='
							.$id_playlist.'">Go to your Playlist</a><br>';

			   	}
			}

	}

}


?>