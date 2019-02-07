<!DOCTYPEhtml>

<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>Other</title>
	<link rel="stylesheet" href="../style/style.css">
</head>

<body>

<?php require "../menu/menu.html"; ?>

<div id="content">

	<header>
		<img src="../library/SpotIFA_logo.png" width="500" height="auto" >
		<h3>Welcome</h3>
		<hr>
	</header>


	<?php

	$user=$_POST['username'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$valid=$_POST['v'];


		$connect = mysqli_connect('localhost','root','', 'SpotIFA');


		$stor_user=strip_tags($_POST['username']);
		$stor_user=addslashes($stor_user);

		$stor_mail=strip_tags($_POST['email']);
		$stor_mail=addslashes($stor_mail);

		$stor_address=strip_tags($_POST['address']);
		$stor_address=addslashes($stor_address);

		$stor_phone=strip_tags($_POST['phone']);
		$stor_phone=addslashes($stor_phone);

		$stor_password=strip_tags($_POST['password']);
		$stor_password=addslashes($stor_password);

		$stor_v=strip_tags($_POST['v']);
		$stor_v=addslashes($stor_v);


		$sql_w="
		INSERT INTO users (ref_user, username, mail, address, phone, password)
		VALUES (NULL, '".$stor_user."', '".$stor_mail."','".$stor_address."','".$stor_phone."',
		'".$stor_password."'
		)";


		if (!$connect) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		if (mysqli_query($connect, $sql_w)) {
		    echo "New Log created<br>";

			echo "<strong>".$user."</strong><br>You are now Register<br>";

			echo "<strong>".$valid."</strong>";

		} 

		else {
		    echo "Error: " . $sql_w . "<br>" . mysqli_error($connect);
		}


		mysqli_close($connect);



	?>


	<footer>
		<hr>
		J.L.DevProg
	</footer>

</div>

</body>

</html>