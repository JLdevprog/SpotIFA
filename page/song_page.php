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
		Songs SpotIFA
	</header>

	<hr>

	<p>

	<?php

	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root',''/* or 'root'*/,
                        array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

	$db_prt = $db_spot->query(
		'SELECT name 
		FROM songs
		ORDER BY id_artist ASC'
	);

	while($data = $db_prt -> fetch()){
                        echo "<a class='button' href='song_sheet.php?name=".$data['name']."'>".$data['name']."</a>";
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