
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
// Initialize the session
date_default_timezone_set('Asia/Manila'); 
error_reporting(0);
ini_set('display_errors', 0);
// Connection variables
$host = "localhost"; // MySQL host name eg. localhost

$user = "root"; // MySQL user. eg. root ( if your on localserver)

$password = ""; // MySQL user password (if password is not set for your root user then keep it empty )

$database = "onopack_asdasdsa"; // MySQL Database name

// Connect to MySQL Database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// error_reporting(0);
$username = htmlspecialchars($_SESSION["username"]);
							$q = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'");
							$f = $q->fetch_array();
								$u_id=$f['admin_id'];
?>

    <div class="modal fade" id="settings" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> <form  method="post" enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:50px;">
        <div class="modal-body">
                <div class = "form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label>Username</label>
                        <input type="text" class="form-control form-control-user" name = "email" value="<?php echo $f['username'];?>"  required>
                        <input type="hidden" class="form-control form-control-user" name = "user_id"  autofocus value="<?php echo $u_id?>" required>
                    </div>     
                </div>
                <div class = "form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>First Name</label>
                        <input type="text" class="form-control form-control-user" name = "fname" value="<?php echo $f['fname'];?>"  required>
                    </div>     
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Middle Name</label>
                        <input type="text" class="form-control form-control-user" name = "mname" value="<?php echo $f['mname'];?>"  required>
                    </div>     
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Last Name</label>
                        <input type="text" class="form-control form-control-user" name = "lname" value="<?php echo $f['lname'];?>"  required>
                    </div>     
                </div>
                <div class = "form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Password</label>
                        <input type="password" class="form-control form-control-user" name = "password" >
                        <input type="hidden" class="form-control form-control-user" name = "password_current" value="<?php echo $f['password'];?>"  >
                    </div>     
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Confirm</label>
                        <input type="password" class="form-control form-control-user" name = "cpassword"  >
                    </div>     
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Current Password</label>
                        <input type="password" class="form-control form-control-user" name = "current_password"  required>
                    </div>     
                </div>
        </div>
        <div class="modal-footer">
            <button  type="button" class="btn btn-secondary"  data-dismiss="modal" aria-label="Close">Close</button>
            <button  type="submit" class="btn btn-danger" name="update_data">Update Data</button>
        </div>
        </form>
        <?php
            if(isset($_POST['update_data'])){
                $email   = $_POST['email'];
                $user_id = $_POST['user_id'];
                $fname   = $_POST['fname'];
                $mname   = $_POST['mname'];
                $lname   = $_POST['lname'];
                $password    = $_POST['password'];
                $cpassword   = $_POST['cpassword'];
                $password_current   = $_POST['password_current'];
                $current_password = $_POST['current_password'];
                if($password==null){
                    $password_update = $password_current;
                    $update = $conn->query("UPDATE `admin` SET `username` = '$email',`fname`='$fname',`mname`='$mname',`lname`='$lname',`password`='$password_update' WHERE `admin_id` = '$user_id'");
                    
    if ($update) {
        echo '<script>
                function myFunction() {
                    swal({
                        title: "Success! ",
                        text: "Successfully Updated Sign In Again",
                        icon: "success",
                        type: "success"
                    }).then(function() {
                        window.location = "logout.php";
                    });
                }
              </script>';
    } else {
        echo '<script>
                function myFunction() {
                    swal({
                        title: "Failed!",
                        text: "Please Try Again",
                        icon: "error",
                        button: "Ok",
                    });
                }
              </script>';
    }
                }elseif($password==$cpassword){
                     if(password_verify($current_password, $password_current)){
                         $password_update = password_hash($password, PASSWORD_DEFAULT);
                         $update = $conn->query("UPDATE `admin` SET `username` = '$email',`fname`='$fname',`mname`='$mname',`lname`='$lname',`password`='$password_update' WHERE `u_id` = '$user_id'");
                         
    if ($update) {
        echo '<script>
                function myFunction() {
                    swal({
                        title: "Success! ",
                        text: "Successfully Updated Sign In Again",
                        icon: "success",
                        type: "success"
                    }).then(function() {
                        window.location = "logout.php";
                    });
                }
              </script>';
    } else {
        echo '<script>
                function myFunction() {
                    swal({
                        title: "Failed!",
                        text: "Please Try Again",
                        icon: "error",
                        button: "Ok",
                    });
                }
              </script>';
    }
                     }else{
                                echo '<script>
                                function myFunction() {
                                    swal({
                                        title: "Failed!",
                                        text: "Please Try Again",
                                        icon: "error",
                                        button: "Ok",
                                    });
                                }
                               </script>';
                     }
                }else{
                    
                                echo '<script>
                                function myFunction() {
                                    swal({
                                        title: "Failed!",
                                        text: "Mismatch Password",
                                        icon: "error",
                                        button: "Ok",
                                    });
                                }
                               </script>';
                }
                
                }
                
                    
                
            
        ?>
      </div>
    </div>
    </div>