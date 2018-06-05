<?php
	session_start();
	unset($_SESSION['User']);
	$_SESSION['User']['Valid'] = 'FALSE';
    $_SESSION['Message']['Logout'] = "Odjavljeni ste!";
	header("Location: administrator.php");
?>