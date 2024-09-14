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
  .printPageButton1{
    display: none;
  }
  @media print {
	#printPageButton {
    display: none;
  }
  .printPageButton1{
    display: inline;
  }
  .printPageButton{
	   display: none;
  }
  #DataTables_Table_0_filter,#DataTables_Table_0_length,#DataTables_Table_0_paginate,#DataTables_Table_0_info{
	  
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
      
      <span class="brand-text font-weight-dark" style="color:white;"><center>Combase IT Solutions</center></span>
	  
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
            <a href="sales.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
              Inventory Department
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="logistic.php" class="nav-link Active">
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
            <a href="logistic.php" class="nav-link Active">
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
            <h1 class="m-0 text-dark printPageButton">Logistic Order List</h1>
          </div><!-- /.col -->
           <!-- /.col -->
        </div>
        </div>
		
		<div class="container-fluid"> 
		
	  <div class="printPageButton">  
			<!--<a href="#"   onclick="window.print()" class = "btn-info btn-m btn"  style="color:black;"> <i class="fas fa-print fa-m"></i> Print this page</a>--->
			 
			<a href="monitoring.php" class="btn-success btn-m btn"  style="text-transform:capitalize;color:white;text-stroke:2px solid black;" data-toggle="modal" data-target="#updateOrder"> 
				<i class="fas fa fa-pen fa-m text-white-100" style="font-size:15px;" title="Mail" ></i> Update Status
			</a> 
			<a href="#" class="btn-info btn-m btn" style="text-transform:capitalize;color:white;text-stroke:2px solid black;" onclick="window.print()"> 
				<i class="fas fa fa-print fa-m text-white-100" style="font-size:15px;"></i> Print Invoice
			</a>
	   </div>
	    <?php
	   
	  error_reporting(0);
	  ini_set('display_errors', 0);
	        $request_id = $_GET['ref'];
	        $q1 = $conn->query("SELECT * FROM `request` WHERE `request_id` = '$request_id'"));
			$f1 = $q1->fetch_array();
			
							$product_id1 = $f1['request_product'];
							$request_branch = $f1['request_branch'];
							$q_s = $conn->query("SELECT * FROM `service` WHERE `service_id` = '$product_id1'"));
							$f_s = $q_s->fetch_array();
							
							$product_id = $f_s['service_id'];
							$q_m = $conn->query("SELECT * FROM `manufacture` WHERE `manu_product_id` = '$product_id'"));
							$f_m = $q_m->fetch_array();
							
							$q_b = $conn->query("SELECT * FROM `branch` WHERE `branch_id` = '$request_branch'"));
							$f_b = $q_b->fetch_array();
							
							if($f_m['manu_product_pcs']==0 || $f_m['manu_product_pcs']==null){
								$qty = 0;
							}else{
								$qty = $f_m['manu_product_pcs'];
							}
							if($f_s['category']=="Box"){
								$qty_produce = $f1['request_qty']/100;
								$extension = "Capsule";
								$extension1 = "Boxes";
							}else{
								$qty_produce = $f1['request_qty'];
								$extension = "Bottle";
								$extension1 = "Bottles";
							}
	    
	    ?>
					
            <div class="card shadow mb-4"  style="margin-top:10px;">
			<div class='card-header py-3 bg-info'>
              <h6 class="m-0 font-weight-bold" style="color:black;" >Logistic Order Report
              <b  style="color:black;float:right;"></b></h6>
            </div>
            <div class="card-body" >
                <div style="margin-bottom:50px;">
                <div class="printPageButton1" style="margin-bottom:50px;">   
                <div class="form-group row">
                <div class="col-sm-8 mb-3 mb-sm-0">    
                    <h5 style="text-transform:capitalize;"><b>Customer Details </b></h5>
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">  
                   
                </div>
                </div>
                </div>
                <div class="printPageButton">   
                <h4>Customer Details</h4></div>
			    <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">    
                    <h5 style="text-transform:capitalize;"><b>Name:</b></h5>
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <h5 style="text-transform:capitalize;"><b>Branch:</b></h5>
                </div>
                <div  class="col-sm-4 mb-3 mb-sm-0">
                     <h5 style="text-transform:capitalize;"><b>Order Status</b></h5>  
                </div>
                </div>
			    <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <h6><text style="text-transform:capitalize;"><?php echo $f1['request_by'];?></text> </h6>
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                     <h6><text style="text-transform:capitalize;"><?php echo $f_b['branch_name'];?></text></h6>
                </div>
                <div  class="col-sm-4 mb-3 mb-sm-0">
                     <text style="font-size:15px;"><?php echo $f1['request_status']?></text>
                </div>
                </div>
                </div>
					<table width="100%" class="display" cellspacing="0">
                  <thead>
                    <tr class="btn-info"  >
                      <th>Request Tracking #</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Total Price</th>
                    </tr>
                  </thead>
                 <tbody>		
	   <?php		
	                $final_total = 0;
					$q_e = $conn->query("SELECT * FROM `request` WHERE `request_id` = '$request_id'");
					while($f_e=$q_e->fetch_array()){
			
							$product_id = $f_e['request_product'];
							
							$q_m = $conn->query("SELECT * FROM `manufacture` WHERE `manu_id` = '$product_id'"));
							$f_m = $q_m->fetch_array();
							$manu_product_id = $f_m['manu_product_id'];
							$q_s = $conn->query("SELECT * FROM `service` WHERE `service_id` = '$manu_product_id'"));
							$f_s = $q_s->fetch_array();
							
							$q_b = $conn->query("SELECT * FROM `branch` WHERE `branch_id` = '$request_branch'"));
							$f_b = $q_b->fetch_array();
							
							if($f_m['manu_product_pcs']==0 || $f_m['manu_product_pcs']==null){
								$qty = 0;
							}else{
								$qty = $f_m['manu_product_pcs'];
							}
							if($f_s['category']=="Box"){
								$qty_produce = $f1['request_qty']/100;
								$extension = "Capsule";
								$extension1 = "Boxes";
							}else{
								$qty_produce = $f1['request_qty'];
								$extension = "Bottle";
								$extension1 = "Bottles";
							}
						
	   ?>
					<tr>
					<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['request_tracking'];?></td>
					<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_s['service_name'];?></td>
					<td style="text-size:8px;text-transform:capitalize;"><?php echo $qty_produce." ".$extension1;?></td>
					<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['request_status'];?></td>
					<td style="text-size:8px;text-transform:capitalize;"><?php echo $f_e['request_date'];?></td>
					<td style="text-size:8px;text-transform:capitalize;"><?php echo $qty_produce * $f_s['service_price'];?></td>
									
							
					</tr>
      
						<?php
						$final_total = $qty_produce * $f_s['service_price'];
						}	
						?>
						
		<div class="modal fade" id="updateOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data"autocomplete="off" >
        <div class="modal-body">
				<div class = "form-group" >
						<label>Status</label>
						<select name="status" class = "form-control" required >
						    <option value="">-Select Status-</option>
						    <option value="For Delivery">For Delivery Order</option>
						    <option value="Delivering">Delivering Order</option>
						    <option value="Delivered">Delivered Order</option>
						</select>
						<input type="hidden" name="ref_id" value="<?php echo $f1['request_id']?>">
						<input type="hidden" name="request_qty" value="<?php echo $f1['request_qty']?>">
						<input type="hidden" name="request_branch" value="<?php echo $f1['request_branch']?>">
						<input type="hidden" name="request_product" value="<?php echo $f1['request_product']?>">
				</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">CLose</button>
          <button class="btn btn-danger" type="submit" name="update11">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>	<?php	
						if(isset($_POST['update11'])){
								$status			=$_POST['status'];
								$ref_id			=$_POST['ref_id'];
								$request_qty	=$_POST['request_qty'];
								$request_product=$_POST['request_product'];
								$request_branch =$_POST['request_branch'];
								if($status=="Delivered"){
									
									$q_pq = $conn->query("SELECT * FROM `inventory_list` WHERE `inv_branch_no` = '$request_branch' AND `inv_branch_p_order`='$request_product'"));
									$f_pq = $q_pq->fetch_array();
									$product_qty = $f_pq['inv_branch_p_pcs'];
									$product_qty_over = $f_pq['inv_branch_p_overall'];
									$request_qty_total = $request_qty + $product_qty;
									$request_qty_total_over = $request_qty + $product_qty_over;
									
					$sql1="SELECT count(*) AS total1 FROM `inventory_list` WHERE `inv_branch_no` = '$request_branch' AND `inv_branch_p_order`='$request_product'";
					$result1=mysqli_query($conn,$sql1);
					$data1=mysqli_fetch_assoc($result1);
					$total = $data1['total1'];
									if($total>=1){
										$conn->query("UPDATE `inventory_list` SET  `inv_branch_p_pcs`='$request_qty_total' WHERE `inv_branch_no` = '$request_branch' AND `inv_branch_p_order`='$request_product'");
									}else{
										$sql123 ="INSERT INTO inventory_list VALUES(null,'$request_branch','$request_product','$request_qty_total','$request_qty_total_over')";
										if (mysqli_query($conn, $sql123)){}
									}
								}
								$result1=$conn->query("UPDATE `request` SET  `request_status`='$status' WHERE `request_id`='$ref_id'");
								if($result1){
									
									 
					            	$date23 = date('m/d/Y h:i:s a', time());	
								echo 
								    '<script>
									    function myFunction() {
										    swal({
										        title: "Success!",
										        text: "Successful Updating Status",
									            icon: "success",
										        type: "success"
										    }).then(function() {
										window.location = "view_order.php?ref='.$ref_id.'";
									  });}
									</script>';
								}else{
									echo 
									'<script>
								    	function myFunction() {
									        swal({
									            title: "Failed!",
									            text: "Please Try Again",
									            icon: "error",
										        type: "error"
										    }).then(function() {
										window.location = "view_order.php?ref='.$ref_id.'";
								        	});}
									</script>';
						        
					        }	
					        }	
			    	?>			
                    </tbody> 
                    <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="bg-danger" style="border-left:1px black solid;border-bottom:1px black solid;border-right:1px black solid;">Final Total</th>
                      <th class="bg-danger" style="border-bottom:1px black solid;border-right:1px black solid;"><?php echo $final_total?></th>
                    </tr>
                  </tfoot>
                </table> <center>
                <br><br> <br><br>
                <div class="printPageButton1">   
                <div class="form-group row">
               
                <div class="col-sm-4 mb-3 mb-sm-0">    
                    <p style="border-top:1px solid black;color:black;"><b>Sales Signature</b></p>
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">    
                    <p style="border-top:1px solid black;color:black;"><b>Logistic Signature</b></p>
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">    
                    <p style="border-top:1px solid black;color:black;"><b>Customer Signature</b></p>
                </div>
                </div>
                </div>
                </center>
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