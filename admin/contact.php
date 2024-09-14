<?php
session_start();
 require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

	date_default_timezone_set('Asia/Manila');
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ERS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Calendar -->
  
  <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-interaction/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  i,p{
	color:white;
}
  @media print {
	#printPageButton {
    display: none;
  }
  .printPageButton{
	   display: none;
  }
  #DataTables_Table_0_filter,#DataTables_Table_0_length,#DataTables_Table_0_paginate{
	  
	   display: none;
  }
  .printHeader1{
	   background:#fff;
  }
}

canvas {
      max-width: 600px;
      margin: 20px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()" >
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-info" >
    <ul class="navbar-nav">
      <li class="nav-item"></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link" style="color:white;">Home</a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-light elevation-4 bg-info"  >
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-dark" style="color:white;"><center> &nbsp Admin Portal</center></span>
	  
    </a>
    <div class="sidebar" >
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block" data-toggle="modal" data-target="#editProfile" style="text-transform:capitalize;color:white;text-stroke:2px solid black;">
		  <?php  
							
							$username = htmlspecialchars($_SESSION["username"]);
							$q = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'");
							$f = $q->fetch_array();
								$u_id=$f['admin_id'];
								$name = "".$f['fname']." ".$f['mname']." ".$f['lname']."";
									echo $name;
						?>
		 </a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
        <li class="nav-item has-treeview">
            <a href="home.php" class="nav-link" >
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="section.php" class="nav-link">
              <p>
              Appointment Management
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="analytics.php" class="nav-link">
              <p>
              Data Analytics
              </p>
            </a>
          </li>  
          <li class="nav-item has-treeview">
            <a href="service.php" class="nav-link ">
              <p>
              Service Management
              </p>
            </a>
          </li>  
          <li class="nav-item has-treeview">
            <a href="contact.php" class="nav-link active">
              <p>
              Contact Management 
              <?php
                        $q1 = $conn->query("SELECT count(*) as count_msg FROM `chat` WHERE `chat_reps_u_id` = '1' AND `view`=''") or die(msqli_error());
                        $f1 = $q1->fetch_array();
                             echo "<b style='color:red;'>".$f1['count_msg']."</b>"; 
              ?>
              </p>
            </a>
          </li>   
          <li class="nav-item has-treeview">
            <a href="user.php" class="nav-link ">
              <p>
              User Management
              </p>
            </a>
          </li> 
          
		  
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#settings">
              <p>
                Settings
              </p>
            </a>
          </li>
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
              <p>
                Logout
              </p>
            </a>
          </li>
          </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
        
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark printPageButton">Patient List </h1>
          </div><!-- /.col -->
           <!-- /.col -->
        </div>
        </div>
			
		<div class="container-fluid"> 	
	    <div class="printPageButton"> 
		</div>
            <div class="card shadow mb-4"  style="margin-top:10px;">
			<div class='card-header py-3  bg-success'>
              <h6 class="m-0 font-weight-bold" style="color:black;" >Patient List
              <b  style="color:black;float:right;"></b></h6>
            </div>
			
          	
            <div class="card-body" >
					<table width="100%" class="display" cellspacing="0">
              
                  <thead>
				 
                    <tr class="btn-success"  >
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>		
	            <?php	
	                error_reporting(0);
	                ini_set('display_errors', 0);
	                
					$q_e = $conn->query("SELECT * FROM `user_account1`  WHERE `u_id`!='11'");
					while($f_e=$q_e->fetch_array()){
	   ?>
					<tr>
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['fname']." ".$f_e['mname']." ".$f_e['lname'];?></td>
						<td ><?php echo $f_e['email']?></td>
						<td >
						    <a href="view-message.php?id=<?php echo $f_e['u_id'];?>" class="btn btn-warning">Chat 
						    <?php
						        $chat_u_id = $f_e['u_id'];
                                $q1 = $conn->query("SELECT count(*) as count_msg FROM `chat` WHERE `chat_reps_u_id` = '1' AND `view`='' AND `chat_to`='$chat_u_id'") or die(msqli_error());
                                $f1 = $q1->fetch_array();
                                    echo "<b style='color:red;'>".$f1['count_msg']."</b>"; 
                            ?>
                            </a>
						</td>	
						
					</tr>
						<?php
						}		
						if(isseT($_GET['user_id'])){
						    $user_id = $_GET['user_id'];
						    $sql124 ="DELETE FROM user_account1 WHERE `u_id`='$user_id'";
				        	if (mysqli_query($conn, $sql124)) {
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Successfully Deleted",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "user.php";
									  });}
									
								  </script>';			
						}else{
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
				
                    </tbody>
                </table>
              </div>
            </div>
			</div>
						
            
      </div>
    </div>
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  
					$q_e1 = $conn->query("SELECT * FROM `user_account1`");
					while($f_e1=$q_e1->fetch_array()){
  ?>              
  <div class="modal fade" id="historyModal<?php echo $f_e1['u_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">History</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
              <div class="container mt-4">
    <?php
    // Assuming $conn is your database connection and $f_e1['u_id'] contains the user ID
    $u_id_data = $f_e1['u_id'];
    $sql = "SELECT * FROM medical_history WHERE `u_id`='$u_id_data' ORDER BY med_id ASC";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card mb-3" >';
            echo '<div class="card-header"><strong>Medical History</strong></div>';
            echo '<div class="card-body" >';
            
            // General Information
            echo '<h5 class="card-title">General Information</h5><br>';
            echo '<p  style="color:black;"  style="color:black;"><strong>Date:</strong> ' . htmlspecialchars($row["med_date"]) . '</p>';
            echo '<p  style="color:black;"><strong>Previous Dentist:</strong> ' . htmlspecialchars($row["med_prev_dent"]) . '</p>';
            echo '<p  style="color:black;"><strong>Last Visit:</strong> ' . htmlspecialchars($row["med_last_vi"]) . '</p>';
            
            // Health Questions
            echo '<h5 class="card-title">Health Questions</h5><br>';
            echo '<p  style="color:black;"><strong>1.) Are you in good health?</strong> ' . htmlspecialchars($row["one"]) . '</p>';
            echo '<p  style="color:black;"><strong>2.) Are you under medical treatment now?</strong> ' . htmlspecialchars($row["two"]) . '</p>';
            echo '<p  style="color:black;"><strong>If so, what is the condition being treated?</strong> ' . htmlspecialchars($row["two_answer"]) . '</p>';
            echo '<p  style="color:black;"><strong>3.) Have you ever had serious illness or surgical operation?</strong> ' . htmlspecialchars($row["three"]) . '</p>';
            echo '<p  style="color:black;"><strong>If so, what illness or operation?</strong> ' . htmlspecialchars($row["three_answer"]) . '</p>';
            echo '<p  style="color:black;"><strong>4.) Have you ever been hospitalized?</strong> ' . htmlspecialchars($row["four"]) . '</p>';
            echo '<p  style="color:black;"><strong>If so, when and why?</strong> ' . htmlspecialchars($row["four_answer"]) . '</p>';
            echo '<p  style="color:black;"><strong>5.) Are you taking any prescription/non-prescription medication?</strong> ' . htmlspecialchars($row["five"]) . '</p>';
            echo '<p  style="color:black;"><strong>If so, please specify:</strong> ' . htmlspecialchars($row["five_answer"]) . '</p>';
            echo '<p  style="color:black;"><strong>6.) Do you use tobacco products?</strong> ' . htmlspecialchars($row["six"]) . '</p>';
            echo '<p  style="color:black;"><strong>7.) Do you use alcohol, cocaine, or other dangerous drugs?</strong> ' . htmlspecialchars($row["seven"]) . '</p>';
            
            // Additional Information
            echo '<h5 class="card-title">Additional Information</h5><br>';
            echo '<p  style="color:black;"><strong>Allergies:</strong> ' . htmlspecialchars($row["allergies_str"]) . '</p>';
            echo '<p  style="color:black;"><strong>Pregnant:</strong> ' . htmlspecialchars($row["pregnant"]) . '</p>';
            echo '<p  style="color:black;"><strong>Nursing:</strong> ' . htmlspecialchars($row["nursing"]) . '</p>';
            echo '<p  style="color:black;"><strong>Pills:</strong> ' . htmlspecialchars($row["pills"]) . '</p>';
            echo '<p  style="color:black;"><strong>Blood Type:</strong> ' . htmlspecialchars($row["blood_type"]) . '</p>';
            echo '<p  style="color:black;"><strong>Conditions:</strong> ' . htmlspecialchars($row["conditions_str"]) . '</p>';
            
            echo '</div>'; // Close card-body
            echo '</div>'; // Close card
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">No records found</div>';
    }
    ?>
</div>
    </table>
</div>
</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  <?php } ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>  
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>  
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
	    <form  method="post" enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:50px;">
        <div class="modal-body">
                <div class = "form-group">
                    <label>Service Name</label>
					<input type="text" class="form-control form-control-user" name = "s_name">
				</div>
                <div class = "form-group">
                    <label>Service Cost</label>
					<input type="text" class="form-control form-control-user" name = "s_cost">
				</div>
                <div class = "form-group">
                    <label>Process Tools</label>
					<select class="form-control form-control-user" name = "process" required>
					    <option value="">Select Process Tools</option>
					     <?php
					         $q_e = $conn->query("SELECT * FROM `process_list` WHERE `process_status`='0' ");
					        while($f_e=$q_e->fetch_array()){
					     ?>   
					    <option value="<?php echo $f_e['process_list_id']?>"><?php echo $f_e['process_list_tags']?></option>
					    <?php } ?>    
					</select>
				</div>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-info" type="submit" name="submit">Save Service</button>
        </div>
        </form>
      </div>
    </div>
  </div> 
  
<?php 
if(isset($_POST['submit'])){
    $s_name = $_POST['s_name'];
    $s_cost  = $_POST['s_cost'];
    $process  = $_POST['process'];
    
        $sql1 ="INSERT INTO services VALUES(null,'$s_name','$s_cost','$process','0')";	
		if (mysqli_query($conn, $sql1)) {    
                echo '<script>
									function myFunction() {
										swal({
										title: "Successfully",
										text: "Added A New Service",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "service.php";
									  });}
									</script>';
            }else{
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
  
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for calendar -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.min.js"></script>
<script src="plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="plugins/fullcalendar-interaction/main.min.js"></script>
<script src="plugins/fullcalendar-bootstrap/main.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script><script>

var check = function() {
  if (document.getElementById('password2').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('password2').style.border = 'green 2px solid';
    document.getElementById('confirm_password').style.border = 'green 2px solid';
    document.getElementById('err2').innerHTML = '<br><span style="color:green;" class="glyphicon glyphicon-ok-sign"> </span> Password confirm';
  } else {
    document.getElementById('password2').style.border = 'red 2px solid';
    document.getElementById('confirm_password').style.border = 'red 2px solid';
    document.getElementById('err2').innerHTML = '<br><span style="color:red;" class="glyphicon glyphicon-remove-sign"> </span> Password and confirm password is not match';
  }
}
          

  $(document).ready(function() {
    $('table.display').DataTable({
        "order": [[ 0, "asc" ]]
    });
} );    
</script>
</body>
</html>