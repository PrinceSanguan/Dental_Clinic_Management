<?php
		session_start();
require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}	

		$time =  date("h:i:m A", time());
		$date =  date("F d,Y", time());
							$username = htmlspecialchars($_SESSION["username"]);
							$q = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'");
							$f = $q->fetch_array();
	?>
<html>
	<head>
		<title>Redirecting</title>
		<style>
		@media only screen and (min-width: 200px) {
			.image{
				margin-top:10%;width:300px;
			}
		}
		</style>
	</head>
	<body >
		<center>
		
		<image src="img/process.gif" class="image">
		<script>
				setTimeout(function(){
				window.location.reload(1);
				window.location.href='home.php';
				}, 2000);
		</script>
		</center>
	</body>
</html>