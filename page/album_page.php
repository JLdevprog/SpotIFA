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
		<h3>Albums</h3>
	</header>


	<p>


	<?php




	$connect = mysqli_connect('localhost','root','', 'SpotIFA');


	$db_result_song=mysqli_query($connect,
		
		'SELECT

		songs.name as name,
		songs.id_album as id_album,

		albums.name as album_name

		FROM songs

		INNER JOIN albums ON songs.id_album=albums.id_album

		ORDER BY albums.id_album DESC

		'
		);

	$temp=0;


	while($db_result_array=mysqli_fetch_assoc($db_result_song)){

		$id_album=$db_result_array['id_album'];

		if($temp!=$db_result_array['id_album'] || $temp==0){

		echo "<hr>";

		/*
			Thank "Remi" DevWeb1 IFAtech2019 
			For Select and Print the song title under The Concern Album
			and not as previous result Album/Song list.
		*/

			echo "<a class='button' href='album_sheet.php?name="
			.$db_result_array['id_album']."'>".$db_result_array['album_name']."</a><br>";

			echo "<br>";

			$temp=$db_result_array['id_album'];

		}
		echo $db_result_array['name'];

		echo "<br>";


	}

	echo "<hr>";

	mysqli_free_result($db_result_song);

	mysqli_close($connect);



	?>

	</p>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>