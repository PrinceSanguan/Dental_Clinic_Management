<?php
	$product_id = $_GET['sales_id'];
    date_default_timezone_set('Asia/Manila'); 
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Materials.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once 'connect.php';
 
	$output = "";
 
	$q_ma = $conn->query("SELECT * FROM `service` WHERE `service_id` = '$product_id'"));
	$f_ma = $q_ma->fetch_array();	
	
	$date_Time = $f_ma['service_upload_by'];
	$myDateTime13 = DateTime::createFromFormat('m/d/Y', $date_Time);
	$newDateString13 = $myDateTime13->format('F Y');
	
	$output .="
		<table>
			<thead>
				<tr >
                      <th style='border:2px solid black;'></th>
                      <th>Inventory Data of ".$f_ma['service_name']." </th>
                      <th> - Month of ".$newDateString13."</th>
                      <th></th>
                      <th style='border:2px solid black;'></th>
				</tr>
			</thead>
			<thead >
				<tr >
                      <th style='border:2px solid black;'>Name</th>
                      <th style='border:2px solid black;'>Quantity</th>
                      <th style='border:2px solid black;'>Unit of Measure</th>
                      <th style='border:2px solid black;'>Date</th>
                      <th style='border:2px solid black;'>Status</th>
                      <th style='border:2px solid black;'>Total</th>
				</tr>
			</thead>
			<tbody >
	";
					error_reporting(0);
					ini_set('display_errors', 0);
					$q_e = $conn->query("SELECT * FROM `produce_materials` WHERE `produce_materials_main_id`='$product_id'");
					while($f_e=$q_e->fetch_array()){
							$produce_materials_id = $f_e['produce_materials_id'];
							$q_m = $conn->query("SELECT * FROM `raw` WHERE `raw_id` = '$produce_materials_id'"));
							$f_m = $q_m->fetch_array();	
							$total = $f_m['raw_price'] * $f_e['produce_materials_qty'];
 
	$output .= "
				<tr >
					<td style='border:2px solid black;'>".$f_m['raw_name']." </td>
					<td style='border:2px solid black;'>".$f_e['produce_materials_qty']." </td>
					<td style='border:2px solid black;'>".$f_m['raw_measure']." 	  </td>
					<td style='border:2px solid black;'>".$f_e['produce_materials_date']." 	  </td>
					<td style='border:2px solid black;'>".$f_e['produce_materials_status']."   	  </td>
					<td style='border:2px solid black;'>".$total." Php</td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
		</table>
	";
 
	echo $output;
 
 
?>