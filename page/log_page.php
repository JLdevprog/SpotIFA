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



<?php 



print_r($_SESSION);

if($_SESSION['user'] && $_SESSION['pass']){

	echo "You Al'Ready Log ?!";
	echo "<a href='logout.php' >Logout</a>";

}


else{


	$_SESSION['user_log']=NULL;

	echo '<div id="content">

		<header>
			<img src="/SpotIFA/library/SpotIFA_logo.png" width="180" height="60">
			<h3>log Page</h3>
		</header>


		<form action="profile_sheet.php" method="post">

			<div class="imgcontainer">
			    <img src="/SpotIFA/library/loger.png" height="80" width="80" >
			</div>

			<label>Sign In</label>

			<div class="container">
			    <input type="text" placeholder="User" name="user_log" required>
			</div>

			<div>
			    <input type="password" placeholder="Password" name="psw_log" required>
			</div>

			<div>
		    	<button type="submit">Login</button>
		  	</div>
		</form>

		<a id="register" href="register_page.php">Register</a>';

}




?>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>