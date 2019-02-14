<!DOCTYPEhtml>

<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>SpotIFA</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="icon" href="../library/logo.png" type="image/png" sizes="18x18">
</head>

<body>

<?php require "../menu/menu.html"; ?>

<div id="content">

	<header>
		<img src="../library/spotifa_logo.png" width="180" height="60">
		<h3>Register Form</h3>
	</header>


	<form action="register_sheet.php" method="post">

		<div class="imgcontainer">
		    <img src="../library/register.png" height="80" width="80" >
		 </div>

		<label>Sign Up</label>

		<div class="container">
		    <input type="text" placeholder="User" name="username" required>
		</div>

		<div class="container">
		    <input type="text" placeholder="Em@il" name="email" required>
		</div>

		<div class="container">
		    <input type="text" placeholder="Address" name="address" required>
		</div>

		<div class="container">
		    <input type="text" placeholder="Phone" name="phone" required>
		</div>

		<div>
		    <input type="password" placeholder="Password" name="password" required>
		</div>

	  	<div>
	  		<input type="checkbox" name="v">For Hell
	  	</div>

		<div>
	    	<button type="submit">Register</button>
	  	</div>

	</form>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>