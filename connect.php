<?php 
// Initialize the session
session_start();
date_default_timezone_set('Asia/Manila'); 
error_reporting(0);
ini_set('display_errors', 0);
// Connection variables
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "onopack_asdasdsa"; 

// Connect to MySQL Database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $password = "";
$username_err = $password_err = "";

if(isset($_POST['signin'])){
    // Check if email and password are empty
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter your email.";
    } else{
        $username = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT u_id, email, password FROM user_account1 WHERE email = ? AND position = ''";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Start new session and store data
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["u_id"] = $id; // Store u_id in session
                            $_SESSION["username"] = $username;  
                            $_SESSION["otp"] = date('msy');
                            
                            // Send OTP
                            mail($username, "One Time Password", "This is your OTP:".$_SESSION["otp"]);
                            
                            // Redirect to user.php, pass the u_id via session
                            header("location: user.php");
                            exit();
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $username_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
}
?>