<?php
	include "connect.php";

	$query = "UPDATE vijesti SET vidljiv = !$_GET[visible] WHERE id = $_GET[id]";
	$result = mysqli_query($con, $query); 

	header("Location: administrator.php");
	mysqli_close($con);
?>