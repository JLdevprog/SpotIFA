<!DOCTYPEhtml>

<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>SpotIFA</title>
	<link rel="stylesheet" href="style/style.css">
</head>

<body>

	<header>
		Spot IFA
	</header>

	<div id="menu">

		<ul>
			<li><div id="menu_logo" href=""><img src="" height="" width="" ></div></li>
			<li><a class="menu_bouton" href="../index.php">Home</a></li>
			<li><a class="menu_bouton" href="../page/artist_page.php">Artist</a></li>
			<li><a class="menu_bouton" href="../page/album_page.php">Album</a></li>
			<li><a class="menu_bouton" href=../"page/music_page.php">Music</a></li>
			<li><a class="menu_bouton" id="menu_other" href="other.asp">Other</a></li>
		</ul>

	</div>

	<hr>

	<?php

	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root',''/* or 'root'*/,
                        array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

	$db_prt = $db_spot->query('SELECT name FROM artists ORDER BY id_artist ASC');

	while($data = $db_prt -> fetch()){
                        echo "<a href='artist_sheet.php?name=".$data['name']."'>".$data['name']."</a><hr>";
                    }


	?>


	<footer>
		"J.L.DevProg"
	</footer>

</body>

</html>