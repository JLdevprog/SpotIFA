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
		Artists SpotIFA
	</header>

	<hr>

	<p>

	<?php

	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root',''/* or 'root'*/,
                        array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

	$db_prt = $db_spot->query('SELECT name FROM artists ORDER BY id_artist ASC');

	while($data = $db_prt -> fetch()){
                        echo "<a class='button' href='artist_sheet.php?name=".$data['name']."'>".$data['name']."</a><hr>";
                    }

	?>

	</p>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>