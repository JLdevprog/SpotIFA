<!DOCTYPEhtml>

<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>SpotIFA</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="icon" href="../library/logo.png" type="image/png" sizes="18x18">
</head>

<body>

<?php require "../menu/menu.html"; ?>

<div id="content">

	<header>
		<img src="../library/spotifa_logo.png" width="180" height="60">
		<h3>Song Detail</h3>
	</header>

	<hr>

	<p>

	<?php
	

	include "../function/function.php";



	if (isset($_GET['song'])){

		$stor_get=strip_tags($_GET['song']);
		$stor_get=addslashes($stor_get);


		$db_result=mysqli_query($connect, 

			'SELECT artists.id_artist, 
				artists.name as a_name, 
				songs.name as s_name,
				songs.release_date as r_date,
				songs.id_album as album
			 FROM artists
			 INNER JOIN songs ON artists.id_artist=songs.id_artist
			 WHERE songs.name = "'.$stor_get.'"			 
			 ORDER BY r_date DESC
			 ');

		
		while($db_result_array=mysqli_fetch_assoc($db_result)){

			echo "<p class='text'> Song Name : ".$db_result_array['s_name']."
				<br>Release Date : ".$db_result_array['r_date']." . </p>";

			echo "<p class='text'>By</p>";
			
			echo "<a class='button' href='artist_sheet.php?name=".$db_result_array['a_name']."'>".$db_result_array['a_name']."</a> <br>";

			echo "<audio controls>
					<source src='../library/store/".$db_result_array['s_name'].".mp3' type='audio/mpeg'><br>
				</audio>";
				

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

		/*echo "<br><br><br>
				Add<br>
				<a class='button' href='song_sheet.php?name="
				.$stor_get."'>".$stor_get."
				</a> <br>
			<br>";*/


		mysqli_free_result($db_result);

	} else {
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