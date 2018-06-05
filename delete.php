<?php
	include "connect.php";
	$query = "DELETE FROM vijesti WHERE id = $_GET[id]";
	$result = mysqli_query($con, $query); 
	header("Location: administrator.php");
	mysqli_close($con);
?>