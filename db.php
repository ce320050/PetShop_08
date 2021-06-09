<?php
	global $conn;

	$conn = mysqli_connect("localhost", "root", "","petshop");
		
	if(!$conn){
		die("Masalah Pada Database");
	}
	$db_use = mysqli_select_db($conn, "petshop") or die("Select Database Problem !!");

	function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows =[];
		while ($row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	  }
?>
