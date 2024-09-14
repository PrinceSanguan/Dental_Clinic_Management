<?php 
// Initialize the session
session_start();
date_default_timezone_set('Asia/Manila'); 
error_reporting(0);
ini_set('display_errors', 0);
// Connection variables
$host = "localhost"; // MySQL host name eg. localhost

$user = "root"; // MySQL user. eg. root ( if your on localserver)

$password = ""; // MySQL user password (if password is not set for your root user then keep it empty )

$database = "onopack_asdasdsa"; // MySQL Database name

date_default_timezone_set('Asia/Manila'); 
// Connect to MySQL Database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// error_reporting(0);


$username = $password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if(isset($_POST['signin'])){
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
		
        $username_err = "";
    } else{
        $username = trim($_POST["email"]);
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
        $sql = "SELECT u_id, email, password FROM user_account1 WHERE email =? AND position=''";
        
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
                        
                            date_default_timezone_set('Asia/Manila'); 
							$date = date('m/d/Y h:i:s a', time());
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["u_id"]     = $id;
                            $_SESSION["username"] = $username;  
                            $_SESSION["otp"]      = date('msy');
                            header("location: home.php");
                            
							if (mysqli_query($conn, $sql)) {	}
                            // Redirect user to welcome page
                            
                            mail($username,"One Time Password","This is your OTP:".$_SESSION["otp"]);
                            header("location: process.php");
                        } else{
                           // Display an error message if password is not valid
							
                            $password_err = "The password you entered was not valid.";
                            echo '<script>
									function myFunction() {
									swal({
									title: "Failed!",
									text: "The password you entered was not valid.",
									icon: "error",
									button: "Ok",
									});}
									</script>';	
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
						
                    $username_err = "No account found with that email.";	
                    echo '<script>
									function myFunction() {
									swal({
									title: "Failed!",
									text: "No account found with that email.",
									icon: "error",
									button: "Ok",
									});}
									</script>';	
                }
            }else{
							echo '<script>
									function myFunction() {
									swal({
									title: "Failed!",
									text: "Oops! Something went wrong. Please try again later.",
									icon: "error",
									button: "Ok",
									});}
									</script>';	
            }
        }
        mysqli_stmt_close($stmt);
    }
}
?>