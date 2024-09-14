<?php 
	
	require_once("connect.php"); 
	if(!empty($_POST["calendar_id"])) {
	$date_current = $_POST["calendar_id"];
	
				$q_mc = $conn->query("SELECT * FROM `raw` WHERE `raw_id` = '$date_current'"));
				$f_mc = $q_mc->fetch_array();
				
	?>
	<input type="text" class="form-control"  id="state-list1" name = "materials_id" disabled value="<?php echo $f_mc['raw_qty'];?>">
	<?php
				
				
				
		}	
?> 
		