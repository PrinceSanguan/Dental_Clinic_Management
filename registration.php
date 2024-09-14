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
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <div class="container-fluid py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>247 National Highway San Vicente, Binãn, Philippines, 4024</small>
                    <small class="me-3"><i class="fa fa-clock me-2"></i>Mon-Sat 09am - 5pm</small>
                </div>
                <nav class="breadcrumb mb-0">
                    <a class="breadcrumb-item small text-body" href="#">Career</a>
                    <a class="breadcrumb-item small text-body" href="#">Support</a>
                    <a class="breadcrumb-item small text-body" href="#">Terms</a>
                    <a class="breadcrumb-item small text-body" href="#">FAQs</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid text-black pt-4 pb-5 d-none d-lg-flex">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <i class="bi bi-telephone-inbound fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-black mb-0">Call Now</h5>
                        <span>+012 345 6789</span>
                    </div>
                </div>
                <a href="index.php">
                    <img src="img/logo_square.png" alt="Logo" style="width:220px;">
                </a>
                <div class="d-flex">
                    <i class="bi bi-envelope fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-black mb-0">Mail Now</h5>
                        <span>inquiry@orthodental.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
                <a href="index.php" class="navbar-brand d-lg-none">
                    <h1 class="text-primary m-0">Orthodental</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">About</a>
                        
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                            <div class="dropdown-menu bg-light m-0">
                                <a href="#" class="dropdown-item">Dental Sealants</a>
                                <a href="#" class="dropdown-item">Tooth Extractions</a>
                                <a href="#" class="dropdown-item">Dentures</a>
                                <a href="#" class="dropdown-item">Root Canal Therapy</a>
                                <a href="#" class="dropdown-item">Invisalign</a>
                                <a href="#" class="dropdown-item">Dental Veneers</a>
                                <a href="#" class="dropdown-item">Pasta</a>
                                <a href="#" class="dropdown-item">Cosmetic Fillings</a>
                                <a href="#" class="dropdown-item">Dental Bonding</a>
                                <a href="#" class="dropdown-item">Dental Crowns</a>
                                <a href="#" class="dropdown-item">Bridgeworks</a>
                            </div>
                        </div>
                        <a href="#" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="ms-auto d-none d-lg-flex">
                        <a class="btn btn-primary ms-2" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  method="post" enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:50px;">
        <div class="modal-body">
            
                <div class="modal-body">
                              <div class = "form-group"  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> style="margin-top:-50px;">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $_POST['email']?>" name = "email"  id="exampleInputUser" aria-describedby="emailHelp" placeholder="Enter Email..." autofocus>
                                <span class="help-block"  style="color:#DC143C;"><?php echo $username_err; ?></span>
                              </div><br>
                              <div class = "form-group"  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                                  <input type="password" class="form-control form-control-user" name = "password"id="exampleInputPassword" placeholder="Enter Password">
                                <span class="help-block"  style="color:#DC143C;"><?php echo $password_err; ?></span>
                                  <br>		
                              </div>
                              <a href="registration.php" style="color:#45505b;text-decoration:none;">No Account Yet ?</a>
                              <a href="#" style="color:#45505b;text-decoration:none;float:right;">Forgot Password</a>
                </div>
        </div>
        <div class="modal-footer">
          <button name="signin" type="submit" class="btn btn-primary" >Sign In</button>
        </div>
        </form>
      </div>
    </div>
    </div>
    <div class="container-fluid py-5">
        
  <div class="container" >

<div class="card o-hidden border-0 shadow-lg my-5" >
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block" style="border-right:1px black solid;"><center><img src="img/logos_clear.png" style="margin-top:100px;width:250px;"></center></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-white-900 mb-4" >Create an Account</h1>
          </div>
          <form class="user"  method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
            <div class="form-group row">
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input type="text" class="form-control"   style=" text-transform:capitalize;"required = "required"placeholder="Last Name" name = "lname" >
              </div>
              <div class="col-sm-4 mb-3 ">
                <input type="text" class="form-control"	style=" text-transform:capitalize;"required = "required"placeholder="First Name" name = "fname">
              </div>
              <div class="col-sm-4 ">
                <input type="text" class="form-control"	style=" text-transform:capitalize;"placeholder="Middle Name" name = "mname" >
              </div>
            </div><br>
            <div class="form-group row">
            
              <div class="col-sm-6">
                <input type="email" class="form-control"  required = "required"name="email2" id="email2" placeholder="Email Address">
                <div id="status2"></div>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control "required = "required" name="username2" id="username2" placeholder="User Name">
                    <div id="status"></div>
                </div>
                    <input type="hidden" class="form-control"  name="position" value="">
            </div><br>
            <div class="form-group row">
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input type="text" class="form-control"   style=" text-transform:capitalize;"required = "required"placeholder="Contact" name = "contact" >
              </div>
              <div class="col-sm-4 mb-3 "><input type="date" class="form-control" style="text-transform:capitalize;" required="required" placeholder="First Name" name="bdate" max="<?php echo date('Y-m-d', strtotime('-1 day')); ?>">

              </div>
              <div class="col-sm-4 ">
                <select name="gender" required class="form-control">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group row">
            
              <div class="col-sm-12">
                <input type="text" class="form-control"  required = "required"name="address" id="email2" placeholder="Address">
                </div>
            </div><br>
            
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control" required 
       placeholder="Password" name="password2" id="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>


                    <div id="err" ></div>
                    <div id="err2"></div>
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control" required = "required" name = "confirm_password" id="confirm_password" placeholder="Repeat Password" onkeyup='check();'>
              </div>
            </div><br>
            <button  class = "btn btn-primary btn-user btn-block" style="float:right;" name="register"  id="register" type="submit"><span class = "glyphicon glyphicon-save"></span> Register Account</button>
                        <br>
                        <br>
            <hr>
           
          </form>
          
<?php

// Include config file
require_once "connect.php";

// Define variables and initialize with empty values
$username = $email =$fname=$mname=$lname = $password = $confirm_password = "";
$username_err = $email_err =$fname_err =$mname_err =$lname_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['register'])){
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $position = $_POST['position'];
  $gender = $_POST['gender'];
  $contact = $_POST['contact'];
  $bdate = $_POST['bdate'];
  $address = $_POST['address'];
    // Validate username
    if(empty(trim($_POST["username2"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT u_id FROM user_account1 WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username2"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username2"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
	if(empty(trim($_POST["email2"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT u_id FROM user_account1 WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email2"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email2"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if(empty(trim($_POST["password2"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password2"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password2"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement 
        $code = date('mdysih');
        $sql = "INSERT INTO user_account1 (username,email,password,fname,mname,lname,position,contact,bdate,gender,address) VALUES (?,?,?,'$fname','$mname','$lname','$code','$contact','$bdate','$gender','$address')";
        $date23 = date('m/d/Y h:i:s a', time());
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
              
               $verify = $code."&email=".$email;
               mail($email,"One Time Password","Please Click this link to verify: https://philscaclinic.com/Orthodental/verify.php?code=$verify");
               echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Your Account Successfully Recorded",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "index.php";
									  });}
									
									</script>';
            } else{
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
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
          <div class="text-center">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    </div>
    <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-6 pe-lg-5">
                    <a href="index.html" class="navbar-brand">
                        <img src="img/logos_clear.png" alt="Logo" style="width:180px;">
                    </a>
                    <p class="fs-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue, iaculis id elit eget, ultrices pulvinar tortor.</p>
                    <p><i class="fa fa-map-marker-alt me-2"></i>247 National Highway San Vicente, Binãn, Philippines, 4024</p>
                    <p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-2"></i>inquiry@orthodental.com</p>
                    <div class="d-flex mt-4">
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Quick Links</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Our Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Popular Links</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Our Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="text-light mb-4">Newsletter</h4>
                            <div class="w-100">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 py-3 px-4" style="background: rgba(255, 255, 255, .1);" placeholder="Your Email Address"><button class="btn btn-primary px-4">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="#">Orthodental</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <p class="mb-0"> <a href="#"></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>