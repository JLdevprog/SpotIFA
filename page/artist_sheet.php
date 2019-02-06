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
		<br>Artits Detail
	</header>

	<hr>


	<?php

	$connect = mysqli_connect('localhost','root','', 'SpotIFA');

	if (isset($_GET['name'])){

		$stor_get=strip_tags($_GET['name']);
		$stor_get=addslashes($stor_get);


		$db_result=mysqli_query($connect, 'SELECT 
			name, gender, age, YEAR(age), YEAR(CURRENT_TIMESTAMP) as hage
			 FROM artists
			 WHERE artists.name = "'.$stor_get.'"
			 ');


		$db_result_array=mysqli_fetch_assoc($db_result);

		echo "<p class='artist'>".$db_result_array['name']."<br>".$db_result_array['gender']."<br>".
		$db_curage=($db_result_array['hage']-$db_result_array['YEAR(age)'])." Y.old <br>".
		$db_result_array['age']."</p><hr>";

		mysqli_free_result($db_result);

		echo "<p class='text'>Last 3 single : </p>";

		$db_result=mysqli_query($connect, 'SELECT artists.id_artist, 
				artists.name as a_name, 
				songs.name as s_name,
				songs.release_date as r_date,
				gender, age, YEAR(age), YEAR(CURRENT_TIMESTAMP) as hage
			 FROM artists
			 INNER JOIN songs ON artists.id_artist=songs.id_artist
			 WHERE artists.name = "'.$stor_get.'"			 
			 ORDER BY r_date DESC
			 LIMIT 3
			 ');

		
		while($db_result_array=mysqli_fetch_assoc($db_result)){

            echo "<a class='button' href='song_sheet.php?song=".$db_result_array['s_name']."'>".
            $db_result_array['s_name']."</a>";

			echo "   /   ".$db_result_array['r_date']." . <br>";

/*
			?>
			<pre>
			<?php
			print_r($db_result_array);
			?>
			</pre>
			<?php
*/
		}

		echo "<hr>";


		mysqli_free_result($db_result);

		echo "<p class='text'>All Albums : </p>";

		$db_result=mysqli_query($connect, 

			'SELECT artists.id_artist, 
				artists.name as a_name,

				albums.id_album as id_album,
				albums.name as album_name,
				albums.release_date as r_date,

				gender, age, YEAR(age), YEAR(CURRENT_TIMESTAMP) as hage

			 FROM artists
			 INNER JOIN albums ON artists.id_artist=albums.id_artist
			 WHERE artists.name = "'.$stor_get.'"			 
			 ORDER BY r_date DESC 
			 ');

		
		while($db_result_array=mysqli_fetch_assoc($db_result)){

            echo "<a class='button' href='album_sheet.php?name=".
            $db_result_array['id_album']."'>".$db_result_array['album_name']."</a>";

			echo "   /   ".$db_result_array['r_date']." . <br>";

/*
			Work for Album Statments
*/
		}


		mysqli_free_result($db_result);

		echo "<hr>";

	} else {
		header('Location: ../index.php');
	}

	mysqli_close($connect);

	?>



	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>