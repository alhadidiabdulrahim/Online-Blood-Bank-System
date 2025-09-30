<?php 
	include 'classPatient.php';
	$patient = new patient();
	$id = $_REQUEST['id'];
	$delete = $patient->delete($id);

	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'Donors&Patient.php';</script>";
	}
 ?>