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
		<h3>log Page</h3>
	</header>


	<form action="log_page.php">

		<div class="imgcontainer">
		    <img src="/SpotIFA/library/loger.png" height="80" width="80" >
		</div>

		<label>Sign In</label>

		<div class="container">
		    <input type="text" placeholder="User" name="uname" required>
		</div>

		<div>
		    <input type="password" placeholder="Password" name="psw" required>
		</div>

		<div>
	    	<button type="submit">Login</button>
	  	</div>
	</form>

	<a id="register" href="register_page.php">Register</a>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>