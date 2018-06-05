<?php
	$con = mysqli_connect("localhost","root","","mojastranica") or die ("Error connecting to MySQL server.");
	mysqli_query($con,"SET NAMES 'utf8'");
	mysqli_query($con,"SET CHARACTER_SET 'utf8'");
?>