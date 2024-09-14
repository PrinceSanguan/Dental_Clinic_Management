<?php 
	require_once("connect.php");
	if(!empty($_POST["country_id"])) {
		$query ="SELECT * FROM section WHERE section_course2 = '" . $_POST["country_id"] . "'";
	    $results = $conn->query($query); 
?> 
    <option value="">Select Section</option>
<?php 
    foreach($results as $state) { 
	    $id = $state["course2_id"];
	    $q  = $conn->query("SELECT * FROM `section` WHERE `section_course2` = '$id' ");
	    $f  = $q->fetch_array();	
?> 
	<option value="<?php echo $state["section_id"]; ?>">
<?php echo $state["section_name"]; ?> 
	</option>
<?php 
        } 
        }
?>