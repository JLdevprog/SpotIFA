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
		Artits Detail SpotIFA
	</header>

	<hr>

	<p>

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

		echo $db_result_array['name']."<br>".$db_result_array['gender']."<br>".
		$db_curage=($db_result_array['hage']-$db_result_array['YEAR(age)'])." Y.old <br>".
		$db_result_array['age']."<hr>";

		mysqli_free_result($db_result);

		echo "Last 3 single : <br>";

		$db_result=mysqli_query($connect, 'SELECT artists.id_artist, 
				artists.name as a_name, 
				songs.name as s_name,
				songs.release_date as r_date,
				gender, age, YEAR(age), YEAR(CURRENT_TIMESTAMP) as hage
			 FROM artists
			 INNER JOIN songs ON artists.id_artist=songs.id_artist
			 WHERE artists.name = "'.$stor_get.'"			 
			 ORDER BY r_date DESC
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