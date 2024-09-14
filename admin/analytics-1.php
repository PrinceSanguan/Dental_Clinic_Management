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
            <a href="analytics.php" class="nav-link active">
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
    </div>
    <!-- /.sidebar -->
  </aside>
        
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark printPageButton">Data Analytics </h1>
          </div><!-- /.col -->
           <!-- /.col -->
        </div>
        </div>
			
		<div class="container-fluid"> 	
	    <div class="printPageButton"> 
			 <a href="analytics.php" class="btn btn-info btn-sm">Service Analytics</a>
			 <a href="analytics-1.php" class="btn btn-danger btn-sm">Weekly Analytics</a>
		<a href="#"  class = "btn-info btn-m btn float-right" onClick="window.print();" style="margin-left:10px;">Print </a>
		</div>
            <div class="card shadow mb-4"  style="margin-top:10px;">
			<div class='card-header py-3  bg-success'>
              <h6 class="m-0 font-weight-bold" style="color:black;" >Analytics
              <b  style="color:black;float:right;"></b></h6>
            </div>
			
            <div class="card-body" >
              <div class="table-responsive" > 
				<?php
// Assuming you have already established a connection to your database

// Sample SQL query to fetch the required data
$sql = "SELECT * FROM appointment_desc WHERE appointment_status = 'Success'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Initialize array for storing daily data
$dailyData = array_fill(0, 7, 0); // Initialize all values to 0

// Initialize variable for storing total weekly appointments
$dailyData1 = 0;

// Fetch data from the result set
while ($row = mysqli_fetch_assoc($result)) {
    $date = date_create_from_format('Y-m-d - h:i', $row['appointment_date']);
    $dayOfWeek = date_format($date, 'w'); // 0 (for Sunday) through 6 (for Saturday)
    $dailyData[$dayOfWeek] += 1;
    $dailyData1 += 1;
}

// Reorder the data to start from Monday
$dailyData = array_merge(array_slice($dailyData, 1, null, true), array_slice($dailyData, 0, 1, true));

// Convert the data to JSON format
$dataJSON = json_encode($dailyData);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <canvas id="myChart" width="400" height="150"></canvas><br>
            <h4 style="float:right;margin-top:50px;">This Week's Appointments: <?php echo $dailyData1; ?></h4>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    window.onload = function() {
        var labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        var data = <?php echo $dataJSON; ?>;

        var ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Appointments',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    };
</script>

              </div>
            </div>
			</div>
						
            
      </div>
    </div>
      
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
          
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
     
  $(document).ready(function() {
    $('table.display').DataTable({
        "order": [[ 0, "desc" ]]
    });
} );       
 
 function handleSelect(elm)
  {
     window.location = elm.value+".php";
  }  
</script>
</body>
</html>