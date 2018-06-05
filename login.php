<?php ob_start();
	session_start();

	$_SESSION['User']['Valid']='FALSE';
	unset($_SESSION['User']);
	include "connect.php";
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query="SELECT username, password, name, level FROM users WHERE username=? AND password=?";
	/* Inicijalizira statement objekt nad konekcijom */
	$stmt=mysqli_stmt_init($con);
	/* Povezuje parametre statement objekt s upitom */
	if (mysqli_stmt_prepare($stmt, $query))
	{
		/* Povezuje parametre i njihove tipove s statement objektom */
		mysqli_stmt_bind_param($stmt,'ss',$username,$password);
		/* Izvršava pripremljeni upit i pohranjuje rezultate */
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
	}
	/* Povezuje atribute iz rezultata s varijablama */
	mysqli_stmt_bind_result($stmt, $username, $password, $name, $level);
	/* Dohvaća redak iz rezultata, i posprema vrijednosti atributa u
	varijable navedene funkcijom mysqli_stmt_bind_result() */
	mysqli_stmt_fetch($stmt);
	
	if (mysqli_stmt_num_rows($stmt)>0)
	{
		$_SESSION['User']  = array(
		"Valid"		=> 'TRUE',
		"Username"	=> $username,
		"Name"		=> $name,
		"Level"		=> $level);
		if($level != 0)
		{
			$_SESSION['Message']['Login'] = $name . ', nemate dovoljna  prava za pristup ovoj stranici.';
		}
		header("Location: administrator.php");
	}
	else
	{
		$_SESSION['Message']['Login'] = "Pogrešno korisničko ime ili lozinka!";
		$_SESSION['Message']['Logout']="";
		header("Location: administrator.php");
	}
?>