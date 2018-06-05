<?php
	session_start();
	
	function contains($str, array $arr)
	{
		foreach($arr as $a) 
		{
			if (stripos($str,$a) !== false) 
				return true;
		}
		return false;
	}
	
	$letters = array('<', '>', '&', '=', '%', ':', '\'', '\“', ' ');
	$password = $_POST['password'];
	if(contains($password, $letters) == false)
	{
		if(isset($_POST['username']))
		{
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$name = $_POST['name'];
			$level = 1;
			include "connect.php";

			$query = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($con, $query);

			if($row = mysqli_fetch_array($result))
			{
				$_SESSION['Message']['Exist']="Korisničko ime već postoji!";
				header("Location: administrator.php");
			}
			else
			{
				$query="INSERT INTO users (username, password, name, level) VALUES (?, ?, ?, ?)";
				/* Inicijalizira statement objekt nad konekcijom */
				$stmt=mysqli_stmt_init($con);
				/* Povezuje parametre statement objekt s upitom */
				if (mysqli_stmt_prepare($stmt, $query))
				{
					/* Povezuje parametre i njihove tipove s statement objektom */
					mysqli_stmt_bind_param($stmt,'ssss',$username,$password,$name,$level);
					/* Izvršava pripremljeni upit */
					mysqli_stmt_execute($stmt);
					$_SESSION['Message']['Registered']="Uspješno ste registrirani!";
				}
				else
				{
					$_SESSION['Message']['Registered']="Pogreška kod registracije!";
				}
				$_SESSION['Message']['Exist']="";
				mysqli_close($con);
				header("Location: administrator.php");
			}
		}
	}
	else
	{
		$_SESSION['Message']['Registered']="Nedozvoljeni znakovi u lozinki!";
		header("Location: administrator.php");
	}
?>