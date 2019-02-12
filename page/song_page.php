<?php
session_start()
?>

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
		<h3>Songs</h3>
	</header>

	<form action="../page/song_sheet.php">
	  <input type="search" id="search" name="song" placeholder="Title">
	  <input type="submit" value="Submit">
	</form>

	<hr>

	<p>

	<?php


	$connect = mysqli_connect('localhost','root','', 'SpotIFA');

	$db_prt = mysqli_query($connect, 
		'SELECT 
		songs.id_song as id_song,
		songs.name as s_name,
		artists.name as a_name

		FROM songs

		INNER JOIN artists ON songs.id_artist=artists.id_artist

		ORDER BY songs.name ASC'
	);

	$db_like = mysqli_query($connect, 
			'
			SELECT 
			likes.ref_user as like_ref_user,
			likes.id_song as like_id_song,

			songs.id_song as id_song,
			songs.name as s_name,
			artists.name as a_name

			FROM likes

			INNER JOIN users ON likes.ref_user=users.ref_user
			INNER JOIN songs ON likes.id_song=songs.id_song
			INNER JOIN artists ON songs.id_artist=artists.id_artist

			'
		);


	//Like Part

	//echo $_SESSION['id'];
	//echo  $_POST['add'];

	if(isset($_POST['add']) && $_SESSION){
   		mysqli_query($connect, 
			'
			INSERT INTO likes (ref_user, id_song)
			VALUES ("'.$_SESSION['id'].'" , "'.$_POST['add'].'")
			'
		);
   	}

   	if(isset($_POST['del']) && $_SESSION){
   		mysqli_query($connect, 
			'
   			DELETE FROM likes
   			WHERE ref_user="'.$_SESSION['id'].'" AND id_song="'.$_POST['del'].'"
   			'
   		);
   	}

	if($_SESSION){


		while($data=mysqli_fetch_assoc($db_like)){

			if($_SESSION['id']==$data['like_ref_user']){

				echo "<br>";

				echo "<a class='button_alike' href=
				'like_page.php?del=".$data['id_song']."'
				><img src='../library/heartbeat(1).png' height='35' width='35' ></a>";

				echo "<a class='button_alike' href=
				'playlist_add_page.php?add_playlist=".$data['id_song']."'
				><img src='../library/playlist.png' height='35' width='35' ></a>";
				
		        echo "<a class='button' href='song_sheet.php?song=".
		        $data['s_name']."'>".$data['s_name']."</a>";
		        echo " By ";
		        echo "<a class='button' href='artist_sheet.php?name=".
		        $data['a_name']."'>".$data['a_name']."</a>";
		        echo "<br><br>";
		        echo "<hr>";

		    }

	   	}

		echo "<hr>";

	}

    else{
		//echo "<a class='button_like' ><img src='../library/heartbeat.png' height='35' width='35' ></a>";
	}

    mysqli_free_result($db_like);


	while($data=mysqli_fetch_assoc($db_prt)){
		echo "<br>";


		if($data['id_song']){
			echo "<a class='button_like' href=
				'like_page.php?add=".$data['id_song']."'
				><img src='../library/heartbeat.png' height='35' width='35' ></a>";
		}

		else{
			//echo "<a class='button_alike' ><img src='../library/heartbeat(1).png' height='35' width='35' ></a>";
		}

        echo "<a class='button' href='song_sheet.php?song=".
        $data['s_name']."'>".$data['s_name']."</a>";
        echo " By ";
        echo "<a class='button' href='artist_sheet.php?name=".
        $data['a_name']."'>".$data['a_name']."</a>";
        echo "<br><br>";
        echo "<hr>";
    }

    mysqli_free_result($db_prt);


    mysqli_close($connect);

	?>

	</p>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>