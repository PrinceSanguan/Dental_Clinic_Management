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
  <title>PMS</title>
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
  <aside class="main-sidebar sidebar-light elevation-4"   style="background:#28110d;">
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-dark" style="color:white;"><center>Golden Minds Colleges</center></span>
	  
    </a>
    <div class="sidebar" >
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block" data-toggle="modal" data-target="#editProfile" style="text-transform:capitalize;color:white;text-stroke:2px solid black;">
		  <?php  
							$username = htmlspecialchars($_SESSION["username"]);
							$q = $conn->query("SELECT * FROM `user_account` WHERE `username` = '$username'");
							$f = $q->fetch_array();
								$u_id=$f['admin_id'];
								$username1=$f['username'];
								$name = "".$f['fname']." ".$f['mname']." ".$f['lname']."";
									echo $name;
						?>
		 </a>
        </div>
      </div>
      <nav class="mt-2">         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="home.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="monitoring.php" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
               Videos
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="playlist.php" class="nav-link active">
              <i class="nav-icon fas fa-play"></i>
              <p>
               Playlist 
              </p>
            </a>
          </li><?php
		$sql24="SELECT count(*) AS total24 FROM `question` WHERE `status`='3'";
		$result24=mysqli_query($conn,$sql24);
		$data24=mysqli_fetch_assoc($result24);
		if($data24['total24']>=1){
			$result1 = '<img src="admin/img/bell_icon_with_notif.png" width="20px" style="margin-left:20px;" / >';
		}else{
			$result1 = '<img src="admin/img/default_bell_icon.png"width="20px"	style="margin-left:20px;" />';
		}
			  ?>
          <li class="nav-item has-treeview">
            <a href="queries.php" class="nav-link">
              <i class="nav-icon fas fa-question"></i>
              <p>
              Queries <text style="float:right;"><?php echo $result1?></text>
	
              </p>
            </a>
          </li>
          </li>
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
            <h1 class="m-0 text-dark printPageButton">Playlist Information</h1>
          </div><!-- /.col -->
           <!-- /.col -->
        </div>
        </div>
		
		<div class="container-fluid"> 
		
	  <div class="printPageButton">  
			<!--<a href="#"   onclick="window.print()" class = "btn-info btn-m btn"  style="color:black;"> <i class="fas fa-print fa-m"></i> Print this page</a>--->
			  
	   </div>
	   
					
            <div class="card shadow mb-4"  style="margin-top:10px;">
			<div class='card-header py-3 bg-info'>
              <h6 class="m-0 font-weight-bold" style="color:black;" >Playlist
              <b  style="color:black;float:right;"></b></h6>
            </div>
			
            <div class="card-body" >
              <div class="table-responsive" > 
					<table width="100%" class="display" cellspacing="0">
              
                  <thead>
				 
                    <tr class="btn-info"  >
                      <th>Title</th>
                      <th>Grade</th>
                      <th>Strand</th>
                      <th>Date Uploaded</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>		
	   <?php			
	   
			error_reporting(0);
			ini_set('display_errors', 0);
			$q = $conn->query("SELECT * FROM `section_info` WHERE `section_list_name` ='$u_id'"));
			$f = $q->fetch_array();
			$section_id = $f['section_id'];
			
			$q1 = $conn->query("SELECT * FROM `section` WHERE `section_id` ='$section_id'"));
			$f1 = $q1->fetch_array();
			$section_name = $f1['section_name'];
			$section_grade = $f1['section_grade'];
			if($section_grade=='G11'){
				$q_e = $conn->query("SELECT * FROM `youtube` WHERE `youtube_grade`='G11'");
					while($f_e=$q_e->fetch_array()){
										
			
						
	   ?>
					<tr>
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_title'];?></td>	
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_grade'];?></td>	
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_strand']?></td>		
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_date_up']?></td>		
						<td style="text-size:8px;text-transform:capitalize;"><a href="view_playlist.php?youtube=<?php echo $f_e['youtube_id']?>&watch=go" class="btn-danger btn-m btn"  style="text-transform:capitalize;color:white;text-stroke:2px solid black;" > 
						<i class="fas fa fa-eye fa-m text-white-100" style="font-size:15px;" title="Mail"></i> View Lesson
					</a></td>			
							
					</tr>
						<?php
						}	
						?>	
				
				<?php
			}elseif($section_grade=='G12'){
				    $q_e = $conn->query("SELECT * FROM `youtube` WHERE `youtube_grade`='G11' OR `youtube_grade`='G12'");
					while($f_e=$q_e->fetch_array()){
										
			
						
	   ?>
					<tr>
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_title'];?></td>	
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_grade'];?></td>			
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_year']?></td>		
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['youtube_strand']?></td>		
						<td style="text-size:8px;text-transform:capitalize;"><?php echo $section_name?></td>			
						<td style="text-size:8px;text-transform:capitalize;"><a href="view_subject.php?youtube=<?php echo $f_e['youtube_id']?>&watch=go" class="btn-danger btn-m btn"  style="text-transform:capitalize;color:white;text-stroke:2px solid black;" > 
						<i class="fas fa fa-eye fa-m text-white-100" style="font-size:15px;" title="Mail"></i> View Lesson
					</a></td>			
							
					</tr>
						<?php
					}	
			}else{	
			?>
					<tr>
						<td style="text-size:8px;text-transform:capitalize;"></td>	
						<td style="text-size:8px;text-transform:capitalize;"></td>			
						<td style="text-size:8px;text-transform:capitalize;"></td>		
						<td style="text-size:8px;text-transform:capitalize;"></td>		
						<td style="text-size:8px;text-transform:capitalize;"></td>			
						<td style="text-size:8px;text-transform:capitalize;"></td>			
							
					</tr>
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
                  </div>
                  </div>
				<div class = "form-group row" >
                  <div class="col-sm-6 mb-3 ">
						<label>Grade</label>
						<select class="form-control" required = "required" name="grade" >
							<option value=""> Select Grade</option>
							<option value="G11">Grade 11</option>
							<option value="G12">Grade 12</option>
						</select >
                  </div>
                  <div class="col-sm-6 mb-3 ">
						<label>Strand</label>
						<select class="form-control" required = "required" name="strand" >
							<option value=""> Select Strand</option>
							<option value="ICT">ICT</option>
							<option value="ABM">ABM</option>
							<option value="HE">HE</option>
							<option value="STEM">STEM</option>
							<option value="GAS">GAS</option>
						</select >
				</div>
				</div>
				<div class = "form-group" >
						<label>Description</label>
						<input type="text" name="desc" class = "form-control" required  style="text-transform:capitalize;">
				</div>
				<div class = "form-group" >
						<label>Section  </label>
						<input type="text" name="sect" class = "form-control" required >
				</div>
				<div class = "form-group" >
						<label>Google Module </label>
						<input type="text" name="g_module" class = "form-control" required  >
				</div>
				<div class = "form-group" >
						<label>Youtube Link </label>
						<input type="text" name="y_module" class = "form-control" required  >
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
	  $grade = $_POST['grade'];
	  $strand = $_POST['strand'];
	  $desc = $_POST['desc'];
	  $sect = $_POST['sect'];
	  $g_module = $_POST['g_module'];
	  $y_module = $_POST['y_module'];
	  $year = date('Ys');
	  $sql123 ="INSERT INTO youtube VALUES(null,'$title','$grade','$desc','$g_module','$y_module','$year','$strand','$sect')";		
					if (mysqli_query($conn, $sql123)) {
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Successfully Added New Lesson",
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