<?php
session_start();
require_once "connect.php";
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src='dist/index.global.js'></script>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

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
  #calendar-container {
    position: fixed;
    width:80%;
    height:60%;
  }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()" >
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-info">
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
            <a href="home.php" class="nav-link active" >
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="section.php" class="nav-link ">
              <p>
              Appointment Management
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="analytics.php" class="nav-link ">
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
            <a href="contact.php" class="nav-link ">
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
            <a href="user.php" class="nav-link">
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
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-light">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
		 
		 </div>
           <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

		
  <div class="row">
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="section.php">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
				<?php 
				
		$sql="SELECT count(*) AS total FROM appointment WHERE `appointment_status`='Pending'";
		$result=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($result);
		echo $data['total'];
				
				?></h3>

                <p>Total # of Appointment</p>
              </div>
              <div class="icon">
              <i class="nav-icon"><ion-icon name="calendar" aria-hidden="true"></ion-icon></i>
              </div>
            </div>
            </a>
          </div>
          <!-- /.col -->
		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="section-approve.php">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
				
		$sql2="SELECT count(*) AS total2 FROM appointment WHERE `appointment_status`='Approve'";
		$result2=mysqli_query($conn,$sql2);
		$data2=mysqli_fetch_assoc($result2);
		echo $data2['total2'];
				
				?></h3>

                <p>Total # of Approve</p>
              </div>
              <div class="icon">
              <i class="nav-icon"><ion-icon name="checkmark-outline" aria-hidden="true"></ion-icon></i>
              </div>
            </div>
            </a>
          </div>
		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="#">
            <div class="small-box bg-success">
                
              <div class="inner">
                <h3><?php 
				
		$sql2="SELECT count(*) AS total3 FROM appointment WHERE `appointment_status`='Cancel'";
		$result2=mysqli_query($conn,$sql2);
		$data2=mysqli_fetch_assoc($result2);
		echo $data2['total3'];
				
				?></h3>

                <p>Total # of Cancel</p>
              </div>
              <div class="icon">
              <i class="nav-icon"><ion-icon name="close" aria-hidden="true"></ion-icon></i>
              </div>
              
            </div>
            </a>
          </div>
		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="#">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
				
		$sql2="SELECT count(*) AS total4 FROM appointment WHERE `appointment_status`='Success'";
		$result1=mysqli_query($conn,$sql2);
		$data1=mysqli_fetch_assoc($result1);
		echo $data1['total4'];
				
				?></h3>

                <p>Total # of Clients</p>
              </div>
              <div class="icon"><i class="nav-icon"><ion-icon name="people-outline" aria-hidden="true"></ion-icon></i>
              </div>
            </div>
            </a>
          </div>
          <!-- /.col -->
        </div>
     <br>
     <div class="row">
    <div class="col-lg-12 col-6">
        <div id='calendar-container'>
    <div id='calendar'></div>
  </div>
    </div>
</div> <!-- /.content-wrapper -->

        <!-- /.row -->
        <!-- Main row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
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
                        <input type="email" class="form-control form-control-user" name = "email" value="<?php echo $f['username'];?>"  required>
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
            <button  class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">Close</button>
            <button  class="btn btn-danger" name="update_data">Update Data</button>
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
                         $update = $conn->query("UPDATE `user_account1` SET `email` = '$email',`fname`='$fname',`mname`='$mname',`lname`='$lname',`password`='$password_update' WHERE `u_id` = '$user_id'");
                         
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
    </div>
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Initialize FullCalendar -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      height: '100%',
      expandRows: true,
      slotMinTime: '08:00',
      slotMaxTime: '20:00',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialView: 'dayGridMonth',
      initialDate: '<?php echo date('Y-m-d');?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        <?php
         $q_e = $conn->query("SELECT * FROM `appointment_desc` WHERE `appointment_status`='Approved' OR `appointment_status`='Remove'");
            while($f_e = $q_e->fetch_array()){
                $appointment_desc   = $f_e['appointment_desc'];
                $original_date_time = $f_e['appointment_date'];
                $cleaned_date_time = str_replace(" - ", " ", $original_date_time);
                $converted_date = date("Y-m-d", strtotime($cleaned_date_time));
                
							$q_service = $conn->query("SELECT * FROM `services` WHERE `services_id` = '$appointment_desc'");
							$f_service = $q_service->fetch_array();
        ?>
        {
          <?php if ($f_e['appointment_status']=='Remove'){?>
            title: 'No Schedule',
            color: 'Red',
          <?php }else{?>
            title: '<?php echo $original_date_time.' - '.$f_service['services_name']?>',
            color: 'Green',
          <?php }?>
            start: '<?php echo $converted_date; ?>',
        },
        <?php } ?>
      ]
    });

    calendar.render();
  });
</script>



</body>
</html>