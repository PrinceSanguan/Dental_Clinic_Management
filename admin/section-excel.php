<?php
include('connect.php'); 
require_once 'excel/vendor/autoload.php'; // Include PhpSpreadsheet autoload file

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Update SQL query to match new columns
$status = $_GET['nav'];
$q_e = $conn->query("SELECT * FROM `appointment_desc` WHERE `appointment_status`='$status' ");

// Create a new PhpSpreadsheet object
$spreadsheet = new Spreadsheet();

// Get the active sheet
$sheet = $spreadsheet->getActiveSheet();

// Write header row
$sheet->setCellValue('A1', 'Client Name');
$sheet->setCellValue('B1', 'Services');
$sheet->setCellValue('C1', 'Appointment Date');
$sheet->setCellValue('D1', 'Status');

// Write data rows
$row = 2;
while ($f_e = $q_e->fetch_array()) {
    
		$u_id_user = $f_e['appointment_id'];
		$q2 = $conn->query("SELECT * FROM `user_account1` WHERE `u_id` = '$u_id_user'");
		$f2 = $q2->fetch_array();
		$appointment_service = $f_e['appointment_desc'];

    $sheet->setCellValue('A' . $row, $f2['fname']." ".$f2['mname']." ".$f2['lname']);
    $sheet->setCellValue('B' . $row, $appointment_service);
    $sheet->setCellValue('C' . $row, $f_e['appointment_date']);
    $sheet->setCellValue('D' . $f_e['appointment_status']);
    $row++;
}

// Create a new Xlsx writer object
$writer = new Xlsx($spreadsheet);

// Set the headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Appointment Data - ' . $status . '.xlsx"');

// Write to PHP output stream
$writer->save('php://output');
exit;
?>
