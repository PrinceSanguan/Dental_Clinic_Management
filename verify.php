<?php 
require_once "connect.php";
date_default_timezone_set('Asia/Manila');

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body onload="myFunction()">
    <?php

        $code = $_GET['code'];
        $email = $_GET['email'];
		$sql="SELECT count(*) AS total FROM user_account1 WHERE `email`='$email' AND `position`='$code' ";
		$result=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($result);
        if($data['total']==1){
            
            $update = $conn->query("UPDATE `user_account1` SET `position` = '' WHERE `email`='$email' AND `position`='$code'");
                echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Your Email Successfully Verify",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "index.php";
									  });}
									
				</script>';         
        }else{ 
                echo '<script>
									function myFunction() {
										swal({
										title: "Failed!",
										text: "Your Email Failed to Verify",
									    icon: "error",
										type: "error"
										}).then(function() {
										window.location = "index.php";
									  });}
									
				</script>'; 
        }
?>
</body>
