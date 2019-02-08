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
		<img src="../library/SpotIFA_logo.png" width="500" height="auto" >
		<h3>Profile</h3>
		<hr>
	</header>


	<?php


	$connect = mysqli_connect('localhost','root','', 'SpotIFA');
	

	if (isset($_POST['user_log']) && isset($_POST['psw_log'])){

		$stor_user=strip_tags($_POST['user_log']);
		$stor_user=addslashes($stor_user);

		$stor_pass=strip_tags($_POST['psw_log']);
		$stor_pass=addslashes($stor_pass);


		$db_result=mysqli_query($connect, '
			SELECT 
				*
			 FROM users
			 WHERE username = "'.$stor_user.'" AND password = "'.$stor_pass.'"
			 ');

		
		while($db_result_array=mysqli_fetch_assoc($db_result)){

            
			?>
			<pre>
			<?php
			print_r($db_result_array);
			?>
			</pre>
			<?php


			$_SESSION['user']=$stor_user;
			$_SESSION['pass']=$stor_pass;

		}

		echo "<hr>";

	} 

	else {
		header('Location: ../index.php');
	}


	mysqli_free_result($db_result);

	mysqli_close($connect);



/*
	$user_log=0;
	$psw_log=0;



	if($_POST||$_SESSION){

		$user_log=$_POST['user_log'];
		$psw_log=$_POST['psw_log'];


			$connect = mysqli_connect('localhost','root','', 'SpotIFA');


			$sql_l=mysqli_query($connect, "
			SELECT
			ref_user, username, password,
			mail, address, phone, 
			FROM
			users
			WHERE username='".$user_log."' "AND" password='".$psw_log."'
			");


			while($db_log_array=mysqli_fetch_assoc($sql_l)){

				echo "test";

			}



	}

	else{
		echo "Error?!";
	}

	mysqli_close($connect);
*/
	?>


	<footer>
		<hr>
		J.L.DevProg
	</footer>

</div>

</body>

</html>