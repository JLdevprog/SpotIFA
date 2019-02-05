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
		Albums SpotIFA
	</header>

	<hr>

	<p>

	<?php

	$db_spot = new PDO('mysql:host=localhost;dbname=SpotIFA','root',''/* or 'root'*/,
                        array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

	$db_prt = $db_spot->query(
		'SELECT id_album, name , id_artist , release_date

		FROM albums
		
		ORDER BY release_date DESC'
	);

	while($data = $db_prt -> fetch()){
                        echo "<a class='button' href='album_sheet.php?name=".$data['id_album']."'>".$data['name']."</a>";

                        echo "";

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