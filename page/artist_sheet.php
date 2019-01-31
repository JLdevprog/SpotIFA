<!DOCTYPEhtml>

<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>SpotIFA</title>
	<link rel="stylesheet" href="../style/style.css">
</head>

<body>

<div id="menu">

	<ul>
		<li><div id="menu_logo" href=""><img src="" height="" width="" ></div></li>
		<li><a class="menu_home" href="../index.php">
			<img src="../library/logo.png" height="50" width="50" ></a></li>
		<li><a class="menu_bouton" href="../page/artist_page.php">Artist</a></li>
		<li><a class="menu_bouton" href="../page/album_page.php">Album</a></li>
		<li><a class="menu_bouton" href=../"page/music_page.php">Music</a></li>
		<li><a class="menu_bouton" id="menu_other" href="other.asp">Other</a></li>
	</ul>

</div>

<div id="content">

	<header>
		Artits Detail SpotIFA
	</header>

	<hr>

	<p>

	<?php

	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root',''/* or 'root'*/,
                        array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

	if (isset($_GET['name'])){
		$db_prt = $db_spot->prepare('SELECT name, gender, age FROM artists WHERE name = ?');
		$db_prt->execute(array($_GET['name']));
		$db_result = $db_prt->fetchAll();

		echo $db_result[0]['name']." / ".$db_result[0]['gender']." / ".$db_result[0]['age'].'<hr>';

	} else {
		header('Location: ../index.php');
	}

	?>

	</p>


	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>