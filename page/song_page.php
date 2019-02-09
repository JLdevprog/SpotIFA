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
		<img src="/SpotIFA/library/SpotIFA_logo.png" width="180" height="60">
		<h3>Songs</h3>
	</header>

	<form action="/SpotIFA/page/song_sheet.php">
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


	while($data=mysqli_fetch_assoc($db_prt)){
		echo "<br>";


		if($data['id_song']){
			echo "<a class='button_like' ><img src='/SpotIFA/library/heartbeat.png' height='35' width='35' ></a>";
		}

		else{
			echo "<a class='button_alike' ><img src='/SpotIFA/library/heartbeat(1).png' height='35' width='35' ></a>";
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

    while($data=mysqli_fetch_assoc($db_like)){
    	?>
			<pre>
			<?php
			print_r($data);
			?>
			</pre>
			<?php
    }

    mysqli_free_result($db_like);

    mysqli_close($connect);

	?>

	</p>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>