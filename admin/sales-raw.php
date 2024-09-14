<?php

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
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars bg-danger"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-light elevation-4 bg-info"  >
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-dark" style="color:white;"><center>Enterprise Resource Plan</center></span>
	  
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
        <?php
            if($f['position']=="Admin"){
            ?>
        <li class="nav-item has-treeview">
            <a href="home.php" class="nav-link" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="sales.php" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
              Inventory Department
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="logistic.php" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
              Logistic Department
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="account.php" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
              Accounting Management
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="user.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              HR Management
              </p>
            </a>
          </li>    
            <?php    
            }else{
                if($f['position']=="Sales"){
            ?>
            <li class="nav-item has-treeview">
            <a href="home.php" class="nav-link " >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="monitoring.php" class="nav-link ">
              <i class="nav-icon fas fa-gift"></i>
              <p>
              Sales Department 
              </p>
            </a>
          </li>
            <?php        
                }elseif($f['position']=="Inventory"){
        ?>
            
            <li class="nav-item has-treeview">
            <a href="home.php" class="nav-link " >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="sales.php" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
              Inventory Department
              </p>
            </a>
          </li>
        
        <?php        
            }elseif($f['position']=="Logistic"){
        ?>
            <li class="nav-item has-treeview">
            <a href="home.php" class="nav-link active" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="logistic.php" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
              Logistic Department
              </p>
            </a>
          </li>
        <?php        
            }else{
        ?>
            <li class="nav-item has-treeview">
            <a href="home.php" class="nav-link active" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="account.php" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
              Accounting Management
              </p>
            </a>
          </li>
        <?php
            }
            }
        ?>
          
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
              <i class="nav-icon ion ion-power" style="font-size:20px;"></i>
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
            <h1 class="m-0 text-dark printPageButton">Raw Information</h1>
          </div><!-- /.col -->
           <!-- /.col -->
        </div>
        </div>
		
		<div class="container-fluid"> 
		
	  <div class="printPageButton">  
			<?php
			        $raw_id = $_GET['raw_id'];
			        $q1 = $conn->query("SELECT * FROM `raw` WHERE `raw_id` = '$raw_id'"));
					$f1 = $q1->fetch_array();
			?>
	   </div>		
        <div class="card shadow mb-4"  style="margin-top:10px;">
			<div class='card-header py-3 bg-info'>
            <h6 class="m-0 font-weight-bold" style="color:black;" >Raw Data
            <b  style="color:black;float:right;"></b></h6>
        </div>
        <div class="card-body" >
		<div class = "form-group row" >
        <div class="col-sm-6 mb-3 mb-sm-0">
                      <center>
                      <img src="upload/<?php echo $f1['raw_file']?>" width="50%">
                      </center>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
        <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data"autocomplete="off" >
			<div class="modal-body">
				 <div class  = "modal-body">
					<div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
						<label>Name</label>
                    <input type="text" class="form-control"   style="text-transform:capitalize;"required = "required"name = "raw_name" value="<?php echo $f1['raw_name']?>">
                  </div>
				  <div class="col-sm-3 mb-3 mb-sm-0">
					<label>Price</label>
					<input type="text" name="raw_price" class = "form-control" required  style="text-transform:capitalize;" value="<?php echo $f1['raw_price']?>">
				  </div>
				  <div class="col-sm-3 mb-3 mb-sm-0">
					<label>Measure</label>
					<input type="text" name="raw_neasure" class = "form-control" required  style="text-transform:capitalize;" value="<?php echo $f1['raw_measure']?>">
				  </div>	
                </div>
				<div class = "form-group row" >
                  <div class="col-sm-6 mb-3 mb-sm-0">
					<label>New Quantity</label>
                    <input type="text" class="form-control" required = "required"name = "qty" value="0">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
					<label>Current Quantity</label>
                    <input type="text" class="form-control" disabled  style="text-transform:capitalize;"required = "required"name = "current_qty" value="<?php echo $f1['raw_qty']?>">
                    <input type="hidden" class="form-control"  style="text-transform:capitalize;" name = "current_qty_add" value="<?php echo $f1['raw_qty']?>">
                 	<input type="hidden" name="raw_id" class = "form-control" required  style="text-transform:capitalize;" value="<?php echo $_GET['raw_id']?>">
				 </div>
				</div>
				</div>
		</div>
        <div class="modal-footer">
				<a  href="sales.php" class = "btn btn-danger" name = "add1" style="float:right;" data-dismiss = "modal" aria-label = "Close">
				<span class = "fas fa-times"></span> Back</a>
        <button  class = "btn btn-primary" name = "pyinsert1" style="float:right;"><span class = "fas fa-save"></span> Update Raw Materials </button>
        </div>
		</form>
		<?php 
		if(isset($_POST['pyinsert1'])){
		 $raw_name         = $_POST['raw_name'];   
		 $raw_price        = $_POST['raw_price']; 
		 $raw_neasure      = $_POST['raw_neasure']; 
		 $current_qty_add  = $_POST['current_qty_add']; 
		 $qty  			   = $_POST['qty']; 
		 $new_qty          = $qty + $current_qty_add; 
		 $raw_id           = $_POST['raw_id']; 
		 if($qty==0){
			$update_log = "Raw Materials Updated";
		 }else{
			$update_log = "Added new Raw Materials";
		 }
		 $rtransdate = date('m/d/Y h:i:s a', time());
	  	 $update1 = $conn->query("UPDATE `raw` SET `raw_name` = '$raw_name', `raw_price` = '$raw_price', `raw_measure` = '$raw_neasure' , `raw_qty` = '$new_qty' WHERE `raw_id` = '$raw_id'");	
		 if($update1){ 
		 $sql_log ="INSERT INTO log VALUES(null,'$raw_id','RAW','$update_log','$rtransdate','$u_id')";
		 if (mysqli_query($conn, $sql_log)) {}
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Your Product Successfully Update",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "sales-raw.php?raw_id='.$raw_id.'";
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
									
									echo '<script>
									function myFunction() {
										swal({
										title: "Failed!",
										text: "Please Try Again",
										icon: "error",
										button: "Ok",
										}).then(function() {
										window.location = "sales-raw.php?raw_id='.$raw_id.'";
									  });}
									
								  </script>';
								}
	        	}
		?>
              </div>
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
  
  <div class="modal fade" id="addBike" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
         <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data"autocomplete="off" >
			<div class="modal-body">
				 <div class  = "modal-body">
					<div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
						<label>Product Name</label>
                    <input type="text" class="form-control"   style="text-transform:capitalize;"required = "required"name = "name" >
                  </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
						<label>Product Quantity</label>
                    <input type="text" class="form-control"   style="text-transform:capitalize;"required = "required" name = "qty" >
                  </div>
                  </div>
					<div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
						<label>Product Price</label>
                    <input type="text" class="form-control"   style="text-transform:capitalize;"required = "required"name = "price" >
                  </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
						<label>Product Picture</label>
                    <input type="file" class="form-control"   style="text-transform:capitalize;"required = "required" name = "file" >
                  </div>
                  </div>
				</div>
			</div>
        <div class="modal-footer">
		<button  class = "btn btn-danger" name = "add1" style="float:right;" data-dismiss = "modal" aria-label = "Close">
		<span class = "fas fa-times"></span> Close</button>
         <button  class = "btn btn-primary" name = "pyinsert" style="float:right;"><span class = "fas fa-save"></span> Save Product </button>
        </div>
							</form>
      </div>
    </div>
  </div> 
  <?php
  if(isset($_POST['pyinsert'])){
	$name  = $_POST['name'];
	$qty   = $_POST['qty'];
	$qty   = $_POST['qty'];
	$price = $_POST['price'];
	
	date_default_timezone_set('Asia/Manila'); 
	$rtransdate = date('m/d/Y h:i:s a', time());
	$cur_date = date('d').date('m').date('y');
	$brand = "VID";
	$invoice = $brand.$cur_date;
	$customer_id = rand(00000 , 99999);
	$uRefNo = $invoice.'-LESSON--'.$customer_id;
     
    $tmp=$_FILES["file"]["tmp_name"];
    $extension = explode("/", $_FILES["file"]["type"]);
    $name1=$uRefNo.".".$extension[1];
     
    move_uploaded_file($tmp, "upload/" . $uRefNo.".".$extension[1]);
    
	date_default_timezone_set('Asia/Manila'); 
	
	$rtransdate = date('m/d/Y h:i:s a', time());
	$ref = "ECOIN-".date("ymidhs",time());
	$sql123 ="INSERT INTO service VALUES(null,'$name','','$price','$qty','$qty','$name1','','','')";
					if (mysqli_query($conn, $sql123)) {
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Successfully Added New Product",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "sales.php";
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
  
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Your Profile</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">	
					<?php
								$q_e2 = $conn->query("SELECT * FROM `user_account` WHERE `u_id` = '$u_id'");
								while($f_e2=$q_e2->fetch_array()){	
					?>	
      
               <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data"autocomplete="off" >
							<div class  = "modal-body">
								<div class = "form-group" >
									<label>First Name</label>
										<input type="text" value="<?php echo $f_e2['fname'];?>" name="fname" class = "form-control" style="text-transform:capitalize;">
										<input type="hidden" value="<?php echo $u_id?>" name="id" class = "form-control" style="text-transform:capitalize;">
									</div>
								<div class = "form-group" >
									<label>Middle Name</label>
									<input type="text" value="<?php echo $f_e2['mname'];?>" name="mname" class = "form-control" style="text-transform:capitalize;">
								</div>
								<div class = "form-group" >
									<label>Last Name</label>
									<input type="text" value="<?php echo $f_e2['lname'];?>" name="lname" class = "form-control" style="text-transform:capitalize;">
								</div>
								<div class = "form-group" >
									<label>Username</label>
									<input type="text" value="<?php echo $f_e2['username'];?>" name="username" class = "form-control" >
								</div>	
								<div class = "form-group" >
									<label>Password</label>
									<input type="password" name="password2" id="password2" class = "form-control" onkeyup='check();'  >
									<input type="hidden" value="<?php echo $f_e2['password'];?>" name="password1" class = "form-control" >
									<div id="err"></div><div id="err2"></div>
								</div>	
								<div class = "form-group" >
									<label>Re-Type Password</label>
									<input type="password" name = "confirm_password" id="confirm_password"class = "form-control" onkeyup='check();'>
								</div>
								
							</div>
							
							
								
							
						
						
						<?php 
						}
						if(isset($_POST['update'])){
						$id 		= $_POST['id'];
						$fname 		= $_POST['fname'];
						$mname		= $_POST['mname'];
						$lname		= $_POST['lname'];	
						$username	= $_POST['username'];
						$password	= $_POST['password2'];
						if($password!=null){
							$password_try = $_POST['password2'];
							$password1 = password_hash($password_try, PASSWORD_DEFAULT);
						}else{
							$password1 = $_POST['password1'];
						}
						$update = $conn->query("UPDATE `user_account` SET `username` = '$username', `fname` = '$fname',`mname` = '$mname',`lname`='$lname',`password`='$password1'WHERE `u_id` = '$id'");	
						
						if ($update) { 
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Your Profile Successfully Update",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "add_lesson.php";
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
		</div>
        <div class="modal-footer">
          <button  class = "btn btn-primary" name = "update" style="float:right;"><span class = "fas fa-save"></span> Update Profile </button>
								<button  class = "btn btn-danger" name = "add1" style="float:right;" data-dismiss = "modal" aria-label = "Close">
								<span class = "fas fa-times"></span> Close</button>
        </div></form>	
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
        "order": [[ 0, "asc" ]]
    });
} );       
 
 function handleSelect(elm)
  {
     window.location = elm.value+".php";
  }  
</script>
</body>
</html>