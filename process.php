<?php
require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}	

		$time =  date("h:i:m A", time());
		$date =  date("F d,Y", time());
		$username = htmlspecialchars($_SESSION["username"]);
			$q = $conn->query("SELECT * FROM `user_account1` WHERE `email` = '$username'");
			$f = $q->fetch_array();
	?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Orthodental Clinic</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body onload="myFunction()">
    	<center>
            <form  method="post" enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:100px;">
    		    <label>We Sent OTP In Your: <?php echo $username?></label><br><br>
    		    <input type="text" name="otp" class="form-control form-control-user" style="width:500px;">
    		    <br>
    		    <p style="color:red;"><b><?php if(isset($_SESSION['error'])){ echo "Wrong OTP Please Try Again";}?></b></p>
    		    <a href="logout.php" class="btn btn-danger" >Sign In Again</a>
    		    <button name="submit_otp" type="submit" class="btn btn-warning" >Send OTP</button>
    		    <button name="submit_data" type="submit" class="btn btn-primary" >Check OTP</button>
    		    
    		</form>
		</center>
		<?php
		if(isset($_POST['submit_otp'])){
		    mail($username,"One Time Password","This is your OTP:".$_SESSION["otp"]);
		    
		                    echo '<script>
        									function myFunction() {
        										swal({
        										title: "Success!",
        										text: "Successfully Sent OTP",
        									    icon: "success",
        										type: "success"
        										}).then(function() {
        										window.location = "process.php";
        									  });}
        								</script>';
		}
		if(isset($_POST['submit_data'])){
		       $otp = $_POST['otp'];
		       if($_SESSION["otp"]==$otp){
		                    echo '<script>
        									function myFunction() {
        										swal({
        										title: "Success!",
        										text: "Successfully Login",
        									    icon: "success",
        										type: "success"
        										}).then(function() {
        										window.location = "home.php";
        									  });}
        								</script>';
		       }else{
		            $_SESSION['error']=1;
                                        echo '<script>
        									function myFunction() {
        									swal({
        									title: "Failed!",
        									text: "Please Try Again",
        									icon: "error",
        									button: "Ok",
        									});}
        								</script>';
		       }
		}
		?>
	</body>
</html>










