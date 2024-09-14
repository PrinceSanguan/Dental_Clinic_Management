<!DOCTYPE html>
<?php
session_start();
 require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Online Travel Express - Customer</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	    <style>
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
		-webkit-appearance: none; 
		margin: 0; 
		}
	</style> 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"  id="accordionSidebar">

     <li class="nav-item">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
       
        
        <div class="sidebar-brand-text sidebar-brand-icon mx-3">Online Travel Express</div>
      </a>

      <!-- Divider -->

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <img src="img/dashboard.png" style="width:30px;height:30px;">
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Reports
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <li class="nav-item">
        <a class="nav-link" href="customer.php"  style="color:white;background:#555555;">
          <img src="img/users.png" style="width:30px;height:30px;">
          <span>Customer Reports</span></a>
      </li>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <li class="nav-item">
        <a class="nav-link" href="booking.php">
       <img src="img/booking.png" style="width:30px;height:30px;">
          <span>Booking Reports</span></a>
      </li>
      </li>
	 <li class="nav-item">
        <li class="nav-item">
        <a class="nav-link" href="visa.php">
         <img src="img/visa.png" style="width:30px;height:30px;">
          <span> Visa Reports</span></a>
      </li>	  <li class="nav-item">
        <li class="nav-item">
        <a class="nav-link" href="package.php">
         <img src="img/package.png" style="width:25px;height:25px;">
          <span>Tour Packages</span></a>
      </li>
      </li>
      </li>
	  <li class="nav-item">
        <li class="nav-item">
        <a class="nav-link" href="log.php">
         <img src="img/log.svg" style="width:25px;height:25px;">
          <span> Activity Logs</span></a>
      </li>
      </li><li class="nav-item">
        <li class="nav-item">
        <a class="nav-link" href="admin.php">
         <img src="img/settings.png" style="width:25px;height:25px;">
          <span> Admin Panel</span></a>
      </li>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

      <!-- Nav Item - Pages Collapse Menu -->
     

     <!-- Divider -->
</li>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-dark bg-primary topbar mb-4 responsive-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
       

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
           

            <!-- Nav Item - Alerts -->
     

            <!-- Nav Item - Messages -->
           

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
                
			<li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i>
                <span class="mr-2 d-none d-lg-inline text-black-800 small">
				<?php  
							$username = htmlspecialchars($_SESSION["username"]);
							$q = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'");
							$f = $q->fetch_array();
								$u_id=$f['admin_id'];
								$name = "".$f['firstname']." ".$f['middlename']." ".$f['lastname']."";
									echo $name;
						?> <i class='	fa fa-angle-double-down fa-sm fa-fw mr-2 text-gray-400'></i>
						</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        </div>

        </div>
        <!-- /.container-fluid -->
							
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Online Travel Express 2016 - <?php echo date('Y');?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
  <script>
  
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
			 $(document).ready(function(){
	$('#table').DataTable();
});

function validate(){
    if(new Date(document.getElementById('datepicker').value) > new Date()){
        alert("You entered future date, that is not valid");
        document.getElementById('datepicker').value='';
    }else{
        alert("Date is correct");
    }
}
function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1000,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><title>Online Travel Express</title><style>table{border:1px solid black;}th{border:1px solid black;}td{border:1px solid black;font-size:12px;}table td:last-child {display:none}table th:last-child {display:none}input{display:none}select{display:none;}button{display:none;}</style><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
$.fn.dataTable.ext.type.detect.unshift(
    function ( d ) {
        return d === 'Low' || d === 'Medium' || d === 'High' ?
            'salary-grade' :
            null;
    }
);
 
$.fn.dataTable.ext.type.order['salary-grade-pre'] = function ( d ) {
    switch ( d ) {
        case 'Low':    return 1;
        case 'Medium': return 2;
        case 'High':   return 3;
    }
    return 0;
};
$(document).ready(function() {
    $('#example').DataTable();
} );
$(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'MM/dd/yy',
            changeMonth : true,
            changeYear : true,
			maxDate: '+50y'
        });
    })
  </script>

</body>

</html>
