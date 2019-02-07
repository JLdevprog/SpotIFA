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

	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root',''/* or 'root'*/,
                        array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

	$db_prt = $db_spot->query(
		'SELECT 
		songs.name as s_name,
		artists.name as a_name

		FROM songs

		INNER JOIN artists ON songs.id_artist=artists.id_artist

		ORDER BY songs.name ASC'
	);

	while($data = $db_prt -> fetch()){
		echo "<br>";
        echo "<a class='button' href='song_sheet.php?song=".
        $data['s_name']."'>".$data['s_name']."</a>";
        echo " By ";
        echo "<a class='button' href='artist_sheet.php?name=".
        $data['a_name']."'>".$data['a_name']."</a>";
        echo "<br><br>";
        echo "<hr>";
    }

	?>

	</p>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>