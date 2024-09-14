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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light  bg-info">
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
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="row mb-2">
          <div class="col-sm-6">
              <?php
	                $u_id_user = $_GET['id'];
					$q2 = $conn->query("SELECT * FROM `user_account1` WHERE `u_id` = '$u_id_user'");
					$f2 = $q2->fetch_array();
              ?>
            <h1 class="m-0 text-dark printPageButton">Patient Data of <?php echo $f2['fname'];?> <?php echo $f2['mname'];?> <?php echo $f2['lname'];?></h1>
          </div><!-- /.col -->
           <!-- /.col -->
        </div>
        </div>
		
		<div class="container-fluid"> 
	    <div class="printPageButton"> 
		<a href="#"  class = "btn-danger btn-m btn" data-toggle="modal" data-target="#addModal">Add New Data</a>
		<a href="#"  class = "btn-info btn-m btn float-right" onClick="window.print();" style="margin-left:10px;">Print </a>
		</div>		
		
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <!---Modal -->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Log Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

	    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:50px;">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Brace Adjustment</label>
                        <select class="form-control" name="brace" id="braceAdjustment">
                            <option value="" disabled>Select Option</option>
                            <option value="teeth services">TEETH SERVICES</option>
                            <option value="brace adjument only">BRACES ADJUSTMENT</option>
                            <option value="braces and teeth services">BRACES ADJUSTMENT AND TEETH SERVICES</option>
                        </select>
                    </div>

                    <div class="form-group" id="teethContainer">
                        <label>Teeth Operated</label>
                        <select class="form-control" name="teeth" id="teeth">
                            <option value="">Select Teeth Operated</option>
                            <!-- Options omitted for brevity -->
                            <option value="1">01 - Third Molar</option>
                            <option value="2">    02 - Second Molar</option>
                                <option value="3">     03 - First Molar</option>
                                <option value="4"> 04 - Second Premolar</option>
                                <option value="5">  05 - First Premolar</option>
                                <option value="6">          06 - Canine</option>
                                <option value="7"> 07 - Lateral Incisor</option>
                                <option value="8"> 08 - Central Incisor</option>
                                <option value="9"> 09 - Central Incisor</option>
                                <option value="10">10 - Lateral Incisor</option>
                                <option value="11">         11 - Canine</option>
                                <option value="12"> 12 - First Premolar</option>
                                <option value="13">13 - Second Premolar</option>
                                <option value="14">    14 - First Molar</option>
                                <option value="15">   15 - Second Molar</option>
                                <option value="16">    16 - Third Molar</option>
                                <option value="17">    17 - Third Molar</option>
                                <option value="18">   18 - Second Molar</option>
                                <option value="19">    19 - First Molar</option>
                                <option value="20">20 - Second Premolar</option>
                                <option value="21"> 21 - First Premolar</option>
                                <option value="22">         22 - Canine</option>
                                <option value="23">23 - Lateral Incisor</option>
                                <option value="24">24 - Central Incisor</option>
                                <option value="25">25 - Central Incisor</option>
                                <option value="26">26 - Lateral Incisor</option>
                                <option value="27">         27 - Canine</option>
                                <option value="28"> 28 - First Premolar</option>
                                <option value="29">29 - Second Premolar</option>
                                <option value="30">    30 - First Molar</option>
                                <option value="31">   31 - Second Molar</option>
                                <option value="32">    32 - Third Molar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control form-control-user" name="status" style="text-transform:capitalize;">
                        <input type="hidden" class="form-control form-control-user" name="user_data" value="<?php echo $_GET['id']; ?>" style="text-transform:capitalize;">
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control form-control-user" name="comment"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-info" type="submit" name="submit">Save Data</button>
                </div>
            </form>
      </div>
    </div>
    <!--Modal-->

  </div> 
 <?php 
if(isset($_POST['submit'])){
    $history_data = $_POST['history_data'];
    $comment = $_POST['comment'];
    $u_id    = $_POST['u_id'];
    $brace = isset($_POST['brace']) && $_POST['brace'] !== '' ? $_POST['brace'] : NULL;
    $teeth = isset($_POST['teeth']) && $_POST['teeth'] !== '' ? $_POST['teeth'] : NULL;
    $user_data = $_POST['user_data'];
    $date_upload = date('F d,Y - h:i:s A');
    // Check if $uploadOk is set to 0 by an error
    $status = $_POST['status'];
            $sql1 = "INSERT INTO dental_history VALUES (null,'$user_data', '$teeth', '$brace', '$comment', '$status', '$date_upload','$history_data')";

            if (mysqli_query($conn, $sql1)) {
                echo '<script>
                    swal({
                        title: "Successfully",
                        text: "Added New Data",
                        icon: "success",
                        button: "Ok",
                    }).then(function() {
                        window.location = "view-history.php?id='.$user_data.'";
                    });
                    </script>';
            } else {
                echo '<script>
                    swal({
                        title: "Failed!",
                        text: "Please Try Again",
                        icon: "error",
                        button: "Ok",
                    }).then(function() {
                        window.location = "view-history.php?id='.$user_data.'";
                    });
                    </script>';
            }
    
}
?>

  
            <div class="card shadow mb-4"  style="margin-top:10px;">
			<div class='card-header py-3  bg-success'>
              <h6 class="m-0 font-weight-bold" style="color:black;" >Patient List
              <b  style="color:black;float:right;"></b></h6>
            </div>
			
            <div class="card-body" >
              <div class="table-responsive" > 
					<table width="100%" class="display" cellspacing="0">
              
                  <thead>
				 
                    <tr class="btn-success"  >
                      <th style="display:none;">ID</th>
                      <th>Date</th>
                      <th>Tooth Chart Tag</th>
                      <th>Braces</th>
                      <th>Comment</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>		
	            <?php	
	                error_reporting(0);
	                ini_set('display_errors', 0);
					$q_e = $conn->query("SELECT * FROM `dental_history` WHERE `dental_user`='$u_id_user'");
					while($f_e=$q_e->fetch_array()){
	   ?>
					<tr>
						<td  style="display:none;"><?php echo $f_e['dental_history_id']?></td>	
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['dental_date'];?></td>
						<td style="text-size:8px;text-transform:capitalize;">
						    <?php
						    $selectedValue = $f_e['dental_file'];
						    if ($selectedValue == 1) {
    echo "01 - Third Molar<br>";
}
if ($selectedValue == 2) {
    echo "02 - Second Molar<br>";
}
if ($selectedValue == 3) {
    echo "03 - First Molar<br>";
}
if ($selectedValue == 4) {
    echo "04 - Second Premolar<br>";
}
if ($selectedValue == 5) {
    echo "05 - First Premolar<br>";
}
if ($selectedValue == 6) {
    echo "06 - Canine<br>";
}
if ($selectedValue == 7) {
    echo "07 - Lateral Incisor<br>";
}
if ($selectedValue == 8) {
    echo "08 - Central Incisor<br>";
}
if ($selectedValue == 9) {
    echo "09 - Central Incisor<br>";
}
if ($selectedValue == 10) {
    echo "10 - Lateral Incisor<br>";
}
if ($selectedValue == 11) {
    echo "11 - Canine<br>";
}
if ($selectedValue == 12) {
    echo "12 - First Premolar<br>";
}
if ($selectedValue == 13) {
    echo "13 - Second Premolar<br>";
}
if ($selectedValue == 14) {
    echo "14 - First Molar<br>";
}
if ($selectedValue == 15) {
    echo "15 - Second Molar<br>";
}
if ($selectedValue == 16) {
    echo "16 - Third Molar<br>";
}
if ($selectedValue == 17) {
    echo "17 - Third Molar<br>";
}
if ($selectedValue == 18) {
    echo "18 - Second Molar<br>";
}
if ($selectedValue == 19) {
    echo "19 - First Molar<br>";
}
if ($selectedValue == 20) {
    echo "20 - Second Premolar<br>";
}
if ($selectedValue == 21) {
    echo "21 - First Premolar<br>";
}
if ($selectedValue == 22) {
    echo "22 - Canine<br>";
}
if ($selectedValue == 23) {
    echo "23 - Lateral Incisor<br>";
}
if ($selectedValue == 24) {
    echo "24 - Central Incisor<br>";
}
if ($selectedValue == 25) {
    echo "25 - Central Incisor<br>";
}
if ($selectedValue == 26) {
    echo "26 - Lateral Incisor<br>";
}
if ($selectedValue == 27) {
    echo "27 - Canine<br>";
}
if ($selectedValue == 28) {
    echo "28 - First Premolar<br>";
}
if ($selectedValue == 29) {
    echo "29 - Second Premolar<br>";
}
if ($selectedValue == 30) {
    echo "30 - First Molar<br>";
}
if ($selectedValue == 31) {
    echo "31 - Second Molar<br>";
}
if ($selectedValue == 32) {
    echo "32 - Third Molar<br>";
}
						    ?>
						</td>
            <td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['dental_brace'];?></td>
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['dental_comment'];?></td>
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['dental_status'];?></td>
						<td ><a href="#" class="btn btn-danger"  data-toggle="modal" data-target="#imageModal<?php echo $f_e['dental_history_id']?>">View Data</a></td>	
					</tr>
  <div class="modal fade" id="imageModal<?php echo $f_e['dental_history_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><center><img src="Chart/<?php echo $f_e['dental_file'];?>.jpg.jpg" style="width:450px;"></center></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <a class="btn btn-primary" href="upload/<?php echo $f_e['dental_file'];?>" download>Download</a>
        </div>
      </div>
    </div>
  </div>  
						<?php
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
  
  <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Lesson</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
         <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data"autocomplete="off" >
			<div class="modal-body">
				 <div class  = "modal-body">
					<div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
						<label>Title</label>
                    <input type="text" class="form-control"   style="text-transform:capitalize;"required = "required"name = "title" >
                    <input type="hidden" class="form-control"   style="text-transform:capitalize;"required = "required"name = "name_user" value="<?php echo $u_id?>">
                  </div>
                  </div>
				<div class = "form-group" >
						<label>Topic Image  </label>
						<input type="file" name="file" class = "form-control" required >
				</div>
				</div>
			</div>
        <div class="modal-footer">
								<button  class = "btn btn-danger" name = "add1" style="float:right;" data-dismiss = "modal" aria-label = "Close">
								<span class = "fas fa-times"></span> Close</button>
          <button  class = "btn btn-primary" name = "pyinsert" style="float:right;"><span class = "fas fa-save"></span> Save Lesson </button>
        </div>
							</form>
      </div>
    </div>
  </div> 
  <?php
  if(isset($_POST['pyinsert'])){
	$title = $_POST['title'];
	$name_user = $_POST['name_user'];
	$year = date('Ys');
	$date = date("F d,Y");
	date_default_timezone_set('Asia/Manila'); 
	$rtransdate = date('m/d/Y h:i:s a', time());
	$cur_date = date('d').date('m').date('y');
	$brand = "TPC";
	$invoice = $brand.$cur_date;
	$customer_id = rand(00000 , 99999);
	$uRefNo = $invoice.'-LESSON-'.$customer_id;
     
    $tmp=$_FILES["file"]["tmp_name"];
    $extension = explode("/", $_FILES["file"]["type"]);
    $name=$uRefNo.".".$extension[1];
     
    move_uploaded_file($tmp, "student/img/" . $uRefNo.".".$extension[1]);
	  $sql123 ="INSERT INTO product VALUES(null,'$name_user','$name','$title','$date')";
					if (mysqli_query($conn, $sql123)) {
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Successfully Added New Lesson",
									    icon: "success",
										type: "success"
										}).then(function() {
										window.location = "monitoring.php";
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
								$q_e2 = $conn->query("SELECT * FROM `user_account1` WHERE `u_id` = '$u_id'");
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
        "order": [[ 0, "desc" ]]
    });
} );       
 
 function handleSelect(elm)
  {
     window.location = elm.value+".php";
  }  
  
function getState1(val) { $.ajax({
type: "POST",
url: "get_state.php",
data:'country_id='+val,
success: function(data){
    $("#state-list1").html(data);
}
});} 

</script>

<!-- Logic for the modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the elements
    var braceAdjustmentSelect = document.getElementById('braceAdjustment');
    var teethContainer = document.getElementById('teethContainer');

    // Function to handle the display of the teeth container
    function handleBraceAdjustmentChange() {
        var selectedValue = braceAdjustmentSelect.value;
        if (selectedValue === 'teeth services' || selectedValue === 'braces and teeth services') { // Teeth Services only or Both
            teethContainer.style.display = 'block';
        } else { // Braces Adjustment only or no selection
            teethContainer.style.display = 'none';
        }
    }

    // Attach the event listener to the select element
    braceAdjustmentSelect.addEventListener('change', handleBraceAdjustmentChange);

    // Initialize the display on page load
    handleBraceAdjustmentChange();
});
</script>
<!-- Logic for the modal -->
</body>
</html>