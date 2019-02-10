<?php 

session_start();

?>

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
		<img src="../library/spotifa_logo.png" width="500" height="auto" >
		<h3>Registration</h3>
		<hr>
	</header>


	<?php



	if($_POST){


	$user=$_POST['username'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];


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



			$sql_w="
			INSERT INTO users (ref_user, username, mail, address, phone, password)
			VALUES (NULL, '".$stor_user."', '".$stor_mail."','".$stor_address."','".$stor_phone."',
			'".$stor_password."'
			)";


			if (!$connect) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			elseif (mysqli_query($connect, $sql_w) && $user!=NULL) {

			    echo "New Log created<br>";

				echo "<strong>".$user."</strong><br>Register<br>";

			} 

			else {
			    echo "Error?!";
			}


		mysqli_close($connect);


	}



	?>


	<footer>
		<hr>
		J.L.DevProg
	</footer>

</div>

</body>

</html>