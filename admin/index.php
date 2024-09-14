<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: process.php");
    exit;
}
 
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['signin'])){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT admin_id, username, password FROM admin WHERE username =?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            date_default_timezone_set('Asia/Manila'); 
							$date = date('m/d/Y h:i:s a', time());
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["admin_id"] = $id;
                            $_SESSION["username"] = $username;                             
                            
							if (mysqli_query($conn, $sql)) {	}
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
if(isset($_POST['goto'])){
	echo '
			<script type = "text/javascript">
					window.location.href="login.php";
			</script>
				';			
}
?>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BMMS</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel = "stylesheet" type = "text/css" href = "css/style-add.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
		<style>
	
	</style>
</head>

<body onload="myFunction()" class="bg-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" >
      <div class="col-lg-6"  style="margin-top:100px;">

        <div class="card o-hidden border-0 shadow-lg my-5" >
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

             
              <div class="col-lg-12" >
                <div class="p-5">
                  <div class="text-center">
			<h2><br>Admin Portal</h2><br>
                  </div>
                  <form action="index.php" method="post" style="margin-top:100px;">
                    <div class = "form-group"  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> style="margin-top:-100px;">
									<input type="text" class="form-control form-control-user"name = "username"  id="exampleInputUser" aria-describedby="emailHelp" placeholder="Enter Username..." autofocus>
                      <span class="help-block"  style="color:#DC143C;"><?php echo $username_err; ?></span>
								</div>
                    <div class = "form-group"  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
									<input type="password" class="form-control form-control-user" name = "password"id="exampleInputPassword" placeholder="Enter Password">
					  <span class="help-block"  style="color:#DC143C;"><?php echo $password_err; ?></span>
								
					</div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                      </div>
					 
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Sign In" name="signin"/>
                    <hr>
                    
                  </form>
                  <div class="text-center">
                  </div>
                </div>
    
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/three.r92.min.js"></script>
<script src="js/vanta.birds.min.js"></script>

  <!-- Custom scripts for all pages-->
</body>

</html>
