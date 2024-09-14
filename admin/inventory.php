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
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-light elevation-4 bg-success"  >
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-dark" style="color:white;"><center>Admin Portal</center></span>
	  
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
								$username1=$f['username'];
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
            <a href="home.php" class="nav-link " >
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
            <a href="inventory.php" class="nav-link active">
              <p>
              Inventory Management
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="service.php" class="nav-link">
              <p>
              Service Management
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="sales.php" class="nav-link">
              <p>
              Sales Management
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
            <h1 class="m-0 text-dark printPageButton">Inventory Management</h1>
          </div><!-- /.col -->
           <!-- /.col -->
        </div>
        </div>
			
		<div class="container-fluid"> 	
	    <div class="printPageButton"> 
		<a href="#"  class = "btn-danger btn-m btn" data-toggle="modal" data-target="#addModal">Add New Items</a>
			 
		</div>
            <div class="card shadow mb-4"  style="margin-top:10px;">
			<div class='card-header py-3  bg-success'>
              <h6 class="m-0 font-weight-bold" style="color:black;" >Inventory List
              <b  style="color:black;float:right;"></b></h6>
            </div>
			
            <div class="card-body" >
              <div class="table-responsive" > 
					<table width="100%" class="display" cellspacing="0">
              
                  <thead>
				 
                    <tr class="btn-success"  >
                      <th style="display:none;">ID</th>
                      <th>Item Name</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>		
	            <?php	
	                error_reporting(0);
	                ini_set('display_errors', 0);
	                $appointment_id = $_GET['appointment_id'];
					$q_e = $conn->query("SELECT * FROM `inventory` WHERE `inventory_status`='0'");
					while($f_e=$q_e->fetch_array()){
	   ?>
					<tr>
						<td style="display:none;"><?php echo $f_e['inventory_id']?></td>	
						<td ><?php echo $f_e['inventory_name']?></td>	
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['inventory_qty'];?></td>
						<td >	    
						    <a href="inventory-update.php?process_id=<?php echo $f_e['inventory_id']?>&action=del"  class = "btn-info btn-m btn">Update</a>
					        <a href="inventory.php?process_id=<?php echo $f_e['inventory_id']?>&action=del"  class = "btn-danger btn-m btn" onclick = "if (! confirm('Do you Want to Delete this ?')) { return false; }">Delete</a>
						</td>
					
					</tr>
						<?php
						}	
						if(isset($_GET['action'])){
						    $process_id          = $_GET['process_id'];
						    $sql_del ="UPDATE `inventory` SET `inventory_status`='1' WHERE `inventory_id`='$process_id'";	
		                    if (mysqli_query($conn, $sql_del)){    
                                echo '<script>
									function myFunction() {
										swal({
										title: "Deleted",
										text: "Successfully Deleted",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "inventory.php";
									  });}
									</script>';
                            }else{  
                                echo '<script>
									function myFunction() {
										swal({
									title: "Failed!",
									text: "Please Try Again",
									    icon: "error",
										type: "error"
										}).then(function() {
										window.location = "inventory.php";
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
          <h5 class="modal-title" id="exampleModalLabel">Add Items</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
	    <form  method="post" enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:50px;">
        <div class="modal-body">
                <div class = "form-group">
                    <label>Item Name</label>
					<input type="text" class="form-control form-control-user" name = "item_name">
				</div>
                <div class = "form-group">
                    <label>Item Quantity</label>
					<input type="text" class="form-control form-control-user" name = "item_qty">
				</div>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-info" type="submit" name="submit">Save Item</button>
        </div>
        </form>
      </div>
    </div>
  </div> 
  
<?php 
if(isset($_POST['submit'])){
    $item_name            = $_POST['item_name'];
    $item_qty  = $_POST['item_qty'];
    
        $sql1 ="INSERT INTO inventory VALUES(null,'$item_name','$item_qty','0')";	
		if (mysqli_query($conn, $sql1)) {    
                echo '<script>
									function myFunction() {
										swal({
										title: "Successfully",
										text: "Added A New Item",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "inventory.php";
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