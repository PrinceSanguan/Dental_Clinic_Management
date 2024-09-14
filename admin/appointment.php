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
      
      <span class="brand-text font-weight-dark" style="color:white;"><center>DERU Admin Portal</center></span>
	  
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
								$u_id     =$f['admin_id'];
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
            <a href="appointment.php" class="nav-link active">
              <p>
              Front Desk Area
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Request Assistant </h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
		  
          <div class="card card-prirary cardutline direct-chat direct-chat-primary" >
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body" >
                <div class="direct-chat-messages fix" id="message-content" style="height:400px;overflow: scroll;display: flex;flex-direction: column-reverse;">
				<?php
				$q_e = $conn->query("SELECT * FROM `chat` WHERE `chat_reps_u_id`='$u_id' ORDER BY `chat_time` DESC");
				while($f_e=$q_e->fetch_array()){

			
					
					$chat_reps_u_id = $f_e['chat_reps_u_id'];
					$chat_time 		  = $f_e['chat_time'];
					$chat_message   = $f_e['chat_message'];
					$chat_user_id   = $f_e['chat_user_id'];
					$file           = $f_e['file'];
					$id_faculty      = $f_e['chat_user_id'];
					$q1 = $conn->query("SELECT * FROM `user_account` WHERE `u_id` = '$chat_user_id'");
					$f1 = $q1->fetch_array();
					if($chat_user_id!=$u_id){	
				?><br>
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix ">
						<span class="direct-chat-name float-left" style="text-transform:capitalize;"><b>
						<?php echo $f1['fname']?></b></span>
						<span class="direct-chat-timestamp float-left" style="font-size:10px;"><?php echo $chat_time?></span>
                    </div>
                    <span  class="direct-chat-img" style="font-size:40px;"></span> 
                    <?php
                    if($file=="Image"){
                        ?>
                    <div class="direct-chat-text float-left">
                        <img src="folder/<?php echo $chat_message?>" width="200" height="200" >
                    </div><br>
                        <?php
                    }elseif($file=="Video"){
                        ?>
                    <div class="direct-chat-text float-left">
                        <video width="200" height="200" controls>
                            <source src="folder/<?php echo $chat_message?>">
                        </video>
                        </div><br>
                        <?php
                    }elseif($file=="Text"){
                        ?>
                    <div class="direct-chat-text float-left"><?php echo $chat_message?></div><br>
                        <?php
                    }else{
                        ?>
                    <div class="direct-chat-text float-left"><?php echo $chat_message?></div><br>
                        <?php
                    }
                    ?>
                    
                </div>
				<?php 
					}else{
				?><br>
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
						<span class="direct-chat-name float-right" style="text-transform:capitalize;float:right;"><b>
						<?php echo $name?></b></span>
						<span class="direct-chat-timestamp" style="font-size:10px;float:right;"><?php echo $chat_time?></span>
                    </div>
                    <span  class="direct-chat-img" style="font-size:40px;"></span> 
                    
                   <?php
                    if($file=="Image"){
                        ?>
                    <div class="direct-chat-text float-right" style="float:right;">
                        <img src="folder/<?php echo $chat_message?>" width="200" height="200" >
                    </div><br>
                        <?php
                    }elseif($file=="Video"){
                        ?>
                    <div class="direct-chat-text float-right"  style="float:right;">
                        <video width="200" height="200" controls controlsList="nodownload">
                            <source src="folder/<?php echo $chat_message?>">
                        </video>
                        </div><br>
                        <?php
                    }elseif($file=="Text"){
                        ?>
                    <div class="direct-chat-text float-right"  style="float:right;"><?php echo $chat_message?></div><br>
                        <?php
                    }else{
                        ?>
                    <div class="direct-chat-text float-right"  style="float:right;"><?php echo $chat_message?></div><br>
                        <?php
                    }
                    ?>
                    
                </div>
				<?php 
						} 
					} 
				?> 
                </div> 
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
				<form class="col-md-12 col-sm-8 col-12 user" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data">
                  <div class="input-group">
                    
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" autocomplete="off">
                    <input type="hidden" name="order" value="<?php echo  $order;?>"class="form-control" autocomplete="off">
                    <input type="hidden" name="faculty_id" value="<?php echo  $id_faculty;?>"class="form-control" autocomplete="off">
                    <span class="input-group-append">
                      <button type="submit" name="send" class="btn btn-primary">Send</button>
                    </span>
                      
                  </div><input type="file" name="file" class="form-control" width="50px">
                </form>
				 <?php 
				if(isset($_POST['send'])){
					$u_id1 = $u_id;
					$order1 =  $_POST['order'];
					$faculty_id =  $_POST['faculty_id'];
					date_default_timezone_set('Asia/Manila'); 
					$date = date("F/d/Y");
					$transdate = date('m/d/Y h:i:s a', time());
					$f_type = $_FILES['file']['type'];
					if($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF"){
					    $type="Image";
					    
				$uRefNo1 = date('mdihs-y',time());
			    $tmp1=$_FILES["file"]["tmp_name"];
				$extension1 = explode("/", $_FILES["file"]["type"]);
				$message=$uRefNo1.".".$extension1[1];
				move_uploaded_file($tmp1, "folder/" .$uRefNo1.".".$extension1[1]);
					}elseif($f_type== "video/mkv" OR $f_type== "video/MKV" OR $f_type== "video/mov" OR $f_type== "video/mp4" OR $f_type== "video/3gp" OR $f_type== "video/ogg" OR $f_type== "video/mov" OR $f_type== "video/MP4" OR $f_type== "video/3GP" OR $f_type== "video/OGG"){
					    $type="Video";
					    
				$uRefNo1 = date('mdihs-y',time());
			    $tmp1=$_FILES["file"]["tmp_name"];
				$extension1 = explode("/", $_FILES["file"]["type"]);
				$message=$uRefNo1.".".$extension1[1];
				move_uploaded_file($tmp1, "folder/" .$uRefNo1.".".$extension1[1]);
					}elseif($f_type==null){
					    $type="Text";
					    $message = $_POST['message'];
					}else{
					    $type="Text";
					    $message = $_POST['message'];
					}
					$sql1 ="INSERT INTO chat VALUES(null,'$faculty_id','$u_id1','$u_id1','$message','$transdate','','','$type')";	
						if (mysqli_query($conn, $sql1)) {
							echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Your Message Successfully Sent",
									    icon: "success",
										type: "success"
										}).then(function(){
										window.location = "appointment.php";
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
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
		 </div>
           <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>  
<div class="modal fade" id="registerEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
              <form class="user"  method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control"   style=" text-transform:capitalize;"required = "required"placeholder="Last Name" name = "lname" >
                  </div>
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control"	style=" text-transform:capitalize;"required = "required"placeholder="First Name" name = "fname">
                  </div>
				  <div class="col-sm-4 mb-sm-0">
                    <input type="text" class="form-control"	style=" text-transform:capitalize;"placeholder="Middle Name" name = "mname" >
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6  mb-3 mb-sm-0">
					<input type="email" class="form-control"  required = "required"name="email" id="email2" placeholder="Email Address">
				  </div>
				  <div class="col-sm-6  mb-3 mb-sm-0">
					<input type="text" class="form-control"  required = "required"name="student_number" placeholder="Student Number">
				  </div>
				</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-info" type="button" name="signin">Save</button>
        </div>
              </form>
      </div>
    </div>
  </div> 
  <?php
  
	if(isset($_POST['signin'])){
		
				$lname 	    = htmlspecialchars($_POST['lname']);
				$fname 		= htmlspecialchars($_POST['fname']);
				$mname      = htmlspecialchars($_POST['mname']);
				$email      = htmlspecialchars($_POST['email']);
				$username      = htmlspecialchars($_POST['student_number']);
				$position      = htmlspecialchars($_POST['position']);
				$pass   	= 'STU-'.date('ydmhsi',time());
				$cpassword   	= htmlspecialchars($_POST['confirm_password']);
				$param_password = password_hash($pass, PASSWORD_DEFAULT);
				$sql1="SELECT count(*) AS total1 FROM `admin` WHERE `email`='$email' OR `username`='$username' ";
				$result1=mysqli_query($conn,$sql1);
				$data1=mysqli_fetch_assoc($result1);
				$count1= $data1["total1"];
				if($count1>=1){
					echo '<script>
							function myFunction() {
							swal({
							title: "Failed!",
							text: "Email or Username already exists",
							icon: "error",
							button: "Ok",
							});}
						   </script>';
				}else{
    	$sql_sched  = "INSERT INTO admin VALUES(null,'$username','$email','$param_password','Student','$fname','$mname','$lname','','Out')";	
    	if (mysqli_query($conn, $sql_sched)){
    $to =     $email;
    $subject = 'Student Account for - '.$username;
    $from = 'noreply@email.montenegro.com';
 
// To send HTML mail, the Content-type header must be set
   $headers .= 'Montenegro Shipping Lines Inc.'."\r\n";
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= 'X-Priority: 3'."\r\n";
   $headers .= 'X-Mailer: PHP". phpversion() .'."\r\n";
    // Compose a simple HTML email message    
    $message = '<html><body>';
    $message .= '<center><div style="width:570px;">';
    $message .= '</br>';
    $message .= '<p style="text-transform:capitalize;font-family:calibri;text-align:left;"><b>Hi '.$fname.',</b></p><br>';
    $message .= '<p style="text-transform:capitalize;font-family:calibri;text-align:left;">Greetings!<br>'; 
    $message .= ' We attached your account for our Appointment Monitoring System<br></p>';
    $message .= '<p style="text-transform:capitalize;font-family:calibri;text-align:left;"> <b>Username: </b>'.$username.'</p>';
    $message .= '<p style="text-transform:capitalize;font-family:calibri;text-align:left;"> <b>Password: </b>'.$pass.'</p>';
    $message .= '<p style="text-transform:capitalize;font-family:calibri;text-align:left;">Please dont share this info to others and we urge you to change your account password</p> '; 
    $message .= '<a href="https://cvsu-appointment.com/login.php" style="background-color: white;color: black;border: 2px solid green; padding: 10px 20px;text-align: center;text-decoration: none; display: inline-block;font-family:calibri;" >Log in Now</a>';  
    $message .= '</div></center>';                                                   
    $message .= '</body></html>';
    if(mail($to, $subject, $message, $headers)){} 
						echo '<script>
									function myFunction() {
										swal({
										title: "Success!",
										text: "Successfully created new account",
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
	}
  ?>
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