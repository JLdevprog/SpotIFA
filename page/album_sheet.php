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
		<h3>Album Detail</h3>
	</header>

	<br>

	<?php

	$connect = mysqli_connect('localhost','root','', 'SpotIFA');

	if (isset($_GET['name'])){

		$stor_get=strip_tags($_GET['name']);
		$stor_get=addslashes($stor_get);


		$db_result=mysqli_query($connect, '
			SELECT 
			id_album,
			name
			FROM albums
			WHERE id_album="'.$stor_get.'"
			');

		
		while($db_result_array=mysqli_fetch_assoc($db_result)){

            echo "<a class='button' href='album_sheet.php?name=".
            $db_result_array['id_album']."'>".$db_result_array['name']."</a>";

		}
	}

		mysqli_free_result($db_result);
?>

	<hr>


	<?php

	$connect = mysqli_connect('localhost','root','', 'SpotIFA');

	if (isset($_GET['name'])){

		$stor_get=strip_tags($_GET['name']);
		$stor_get=addslashes($stor_get);


		$db_result=mysqli_query($connect, '
			SELECT 
				albums.id_album, 
				albums.name as a_name, 
				songs.name as s_name,
				songs.release_date as r_date,
				songs.id_album
			 FROM songs
			 INNER JOIN albums ON songs.id_album=albums.id_album
			 WHERE songs.id_album = "'.$stor_get.'"
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