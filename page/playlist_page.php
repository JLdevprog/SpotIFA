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
			<img src="../library/spotifa_logo.png" width="180" height="60">
			<h3>Playlist</h3>
		</header>


<?php 


$connect = mysqli_connect('localhost','root','', 'SpotIFA');


$db_playlist = mysqli_query($connect,
			'
			SELECT 
			playlists.id_playlist as id_playlist,
			playlists.name as name,
			playlists.creation_date as creation_date,
			playlists.ref_user as ref_user

			FROM playlists

			INNER JOIN users ON playlists.ref_user=users.ref_user

			'
		);


echo "<hr>";


if($_SESSION){

	while($data=mysqli_fetch_assoc($db_playlist)){

			if($_SESSION['id']==$data['ref_user']){

				echo "<br>";

				/*?>
				<pre>
				<?php
				print_r($data);
				?>
				</pre>
				<?php*/

				echo "<a class='button' href='playlist_sheet.php?playlist=".
		        $data['id_playlist']."'>".$data['name']."</a>";

		        echo "<br><br><hr>";

		    }

   	}

	echo "<hr><br><br>";	

}



if($_SESSION==NULL){


	echo '


		<form action="profile_sheet.php" method="post">

			<div class="imgcontainer">
			    <img src="../library/loger.png" height="80" width="80" >
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

		if ($_COOKIE) {
			echo '<br> Log from cookie <a href="profile_sheet.php">Link</a>';
		}

		else{}

	
}


else{


	$stor_user=$_SESSION['user'];
	$stor_pass=$_SESSION['pass'];


	$connect = mysqli_connect('localhost','root','', 'SpotIFA');

	$db_result=mysqli_query($connect, '
			SELECT 
				*
			 FROM users
			 WHERE username = "'.$stor_user.'" AND password = "'.$stor_pass.'"
			 ');

		
		while($db_result_array=mysqli_fetch_assoc($db_result)){

            /*
			?>
			<pre>
			<?php
			print_r($db_result_array);
			?>
			</pre>
			<?php
			*/


			$_SESSION['user']=$stor_user;
			$_SESSION['pass']=$stor_pass;
			$_SESSION['id']=$db_result_array['ref_user'];


			echo '<div class="imgcontainer">
			    	<img src="../library/logerlog.png" height="80" width="80" >
				</div><br>';


			echo "Pseudo : "	.$_SESSION['user']."<br>";
			echo "eM@il : "		.$db_result_array['mail']."<br>";
			echo "address : "	.$db_result_array['address']."<br>";
			echo "phone : "		.$db_result_array['phone']."<br>";
			echo "Ref_User : "	.$_SESSION['id'];


		}



	mysqli_free_result($db_result);

	mysqli_close($connect);

	echo '<p>';
	echo "You Al'Ready Log ?!";
	echo '<br>';
	echo "<a href='logout.php' >Logout</a>";
	echo '</p>';

	//header('location:"/profile_sheet.php"'); 

}




?>

	<footer>
		"J.L.DevProg"
	</footer>

</div>

</body>

</html>