<?php 
	include 'classDonor.php';
	$donor = new donor();
	$id = $_REQUEST['id'];
	$delete = $donor->delete($id);

	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'Donors&Patient.php';</script>";
	}
 ?>