<!DOCTYPEhtml>

<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>SpotIFA</title>
	<link rel="stylesheet" href="../style/style.css">
</head>

<body>

<?php require "../menu/menu.html"; ?>

<div id="content">

	<header>
		<img src="../library/spotifa_logo.png" width="180" height="60">
		<h3>Playlist Detail</h3>
	</header>

	<p>

	<?php


	$connect = mysqli_connect('localhost','root','', 'SpotIFA');


	if (isset($_GET['playlist'])){

		$stor_get=strip_tags($_GET['playlist']);
		$stor_get=addslashes($stor_get);


		$db_playlist = mysqli_query($connect,
			'
			SELECT 
			playlists.id_playlist as id_playlist,
			playlists.name as name,
			playlists.creation_date as creation_date,
			playlists.ref_user as ref_user

			FROM playlists

			INNER JOIN users ON playlists.ref_user=users.ref_user


			WHERE playlists.id_playlist = "'.$stor_get.'"

			'
		);

	
	$db_playlist_content=mysqli_query($connect, 

		'SELECT

		*

		/*playlist_content.id_playlist as id_playlist,
		playlist_content.id_song as id_song*/
		
		FROM playlist_content

		INNER JOIN playlists ON 
			playlist_content.id_playlist=playlists.id_playlist
		INNER JOIN songs ON playlist_content.id_song=songs.id_song

		INNER JOIN users ON playlists.ref_user=users.ref_user

		WHERE playlists.id_playlist = "'.$stor_get.'"

		');

		
		while($data=mysqli_fetch_assoc($db_playlist)){

			/*?>
			<pre>
			<?php
			print_r($data);
			?>
			</pre>
			<?php*/

			echo "<br><a class='button' href='playlist_sheet.php?playlist=".
		        $data['id_playlist']."'>".$data['name']."</a>";

	        echo "<br>".$data['creation_date']."<br>";


	        echo "<br>Delete<br>";

			echo "<a class='button_delete' href='delete_page.php?delete=
			".$data['id_playlist']."'><img src='../library/delete.png' height='50' width='50' ></a> <br>";


		    echo "<br><hr>";

		    while($data=mysqli_fetch_assoc($db_playlist_content)){

		    	/*?>
				<pre>
				<?php
				print_r($data);
				?>
				</pre>
				<?php*/

				echo "<br><a class='button' href='song_sheet.php?song=".
		        $data['name']."'>".$data['name']."</a>";

				echo '<a class="button_delete" href="delete_page.php?delete_song='
							.$data['id_song'].
							'&playlist='.$data['id_playlist'].
					        '"><img src="../library/delete.png" height="25" width="25" ></a><br>';

		    }

		    echo "<br><hr>";


		}


		mysqli_free_result($db_playlist);

/*
		$db_result_album=mysqli_query($connect, 

			'SELECT 
				albums.id_album as id_album, 
				albums.name as a_name, 
				songs.name as s_name,
				songs.release_date as r_date,
				songs.id_album as song_id_album
			 FROM albums
			 INNER JOIN songs ON albums.id_artist=songs.id_artist
			 WHERE songs.name = "'.$stor_get.'"
			 ');

		while($db_result_array=mysqli_fetch_assoc($db_result_album)){


			if($db_result_array['song_id_album']==$db_result_array['id_album']){

			echo "<p class='text'>From</p>";

				echo "<a class='button' href='album_sheet.php?name=".$db_result_array['song_id_album']."'>".$db_result_array['a_name']."</a> <br>";
			}

			else{
			}

		}
*/


	} 

	else {
		header('Location: ../index.php');
	}

	mysqli_close($connect);

	?>

	</p>


	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>