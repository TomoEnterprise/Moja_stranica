<?php
	session_start();
	include "connect.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Newsletter</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" rel='stylesheet' href="style.css">
		<script src="https://use.fontawesome.com/e6e8d7964c.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Raleway:800' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato:800' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		
	</head>
	<body>
	
		<header>
			<section class="container">
					<a class="maknia" href="index.php"><h1>Newsletter</h1></a>
					<nav >
						<ul>
							<li><a href="index.php">Nova vijest</a></li>
							<li><a  href="index.php">O nama</a></li>
							<li><a  href="index.php">Kontakt</a></li>
							<li><a  href="administrator.php">Admin</a></li>
						</ul>
						
					</nav>
			</section>
		</header>
		
		
		
		<main>
						<?php
							if(isset($_POST['register']) || $_SESSION['Message']['Exist']=='Korisničko ime već postoji!' || $_SESSION['Message']['Registered'] == 'Nedozvoljeni znakovi u lozinki!')
							{
								echo '<article><div id="noposts"><h2>Registracija</h2>';
								echo '<br>'.$_SESSION['Message']['Exist'];
								echo $_SESSION['Message']['Registered'];
								$_SESSION['Message']['Exist']="";
								$_SESSION['Message']['Registered']="";
								echo '<form action="register.php" id="loginform" method="post">
								<div id="labelUser">Korisničko ime:</div><input type="text" name="username" required autofocus><br>
								<div id="labelUser">Lozinka:</div><input type="password" name="password" required><br>
								<div id="labelUser">Ime:</div><input type="text" name="name" required></br></br>
								<a href="administrator.php">Povratak na login</a>
								<input type="submit" name="submit" id="registerbutton" value="Potvrdi">
								</form>';
							}
							else if($_SESSION['User']['Valid']=='TRUE' && $_SESSION['User']['Level'] == 0)
							{
								echo '<div id="logoutbig"><div id="loggedIn">Prijavljeni ste kao <span style="color:red; font-style:italic" >' . $_SESSION['User']['Name'] .'</span></div>';
								echo '<form action="logout.php" method="post"><input type="submit" id="logoutbutton" value="Odjava"></form></div>';
								$query = "SELECT * FROM vijesti";
								$result = mysqli_query($con, $query) or die('Error querying databese.');
								
								while($row = mysqli_fetch_array($result))
								{
									echo '<article><h2><a href="index.php?id=' . $row['id'] . '">' . $row['naslov'] . '</a></h2>
										<h3>' . $row['kratkiSadrzaj'] . '</h3>
										<div id="kategorija">
										<div id="kategorija_naslov">Kategorija: </div>
										<h4>' . $row['kategorija'] . '</h4></div>
										<div id="text"><p>' . $row['sadrzaj'] . '</p></div>';

									if($row['vidljiv'])
									{
										echo '<div id="vidljivost">Vijest nije skrivena</div>';
										echo '<div id="hide"><a href="toggleVisibility.php?id=' . $row['id'] . '&amp;visible=' . $row['vidljiv'] . '">Sakrij vijest s početne</a></div>';
									}
									else
									{
										echo '<div id="vidljivost">Vijest je skrivena</div>';
										echo '<div id="hide"><a href="toggleVisibility.php?id=' . $row['id'] . '&amp;visible=' . $row['vidljiv'] . '">Prikaži vijest na početnoj</a></div>';
											
									}
									echo '<div id="delete"><a href="delete.php?id=' . $row['id'] . '">Obriši vijest</a></div></article>';								
								}
							}
							else
							{
								echo '<article><div id="noposts"><h2>Prijava</h2>';
								echo '<br>'.$_SESSION['Message']['Logout'] . $_SESSION['Message']['Login'] . $_SESSION['Message']['Registered'];
								$_SESSION['Message']['Registered']="";
								$_SESSION['Message']['Login']="";
								$_SESSION['Message']['Logout']="";
								echo '<form action="login.php" id="loginform" method="post">
								<div id="labelUser">Korisničko ime:</div><input type="text" name="username" required autofocus><br>
								<div id="labelUser">Lozinka:</div><input type="password" name="password" required><br><br>
								<div id="buttonsLogin">
								<input type="submit" name="submit" id="loginbutton" value="Prijava">
								</form>
								<form action="" method="post" id="regform">
								<input type="submit" value="Registracija" id="registerbutton" name="register"></div>
								</form></div>';
							}
						?>
		
		</main>
		
		
		
		<footer>
				<section class="container1">
					<article class="lijevif">
						<p class="Don_t_want_to_receive_anymore_emails__Unsubscri">Don't want to receive anymore emails? Unsubscribe</p>
						<p class="Don_t_want_to_receive_anymore_emails__Unsubscri">Freebiesgallery, 329 Notingham Street, San Francisco, CA 94307</p>
						<p class="Don_t_want_to_receive_anymore_emails__Unsubscri">© Copyright 2013 FreebiesGallery. All rights reserved.</p>
					</article>
					<article class="desnif">
						<a href="http://www.facebook.com"><img src="Slike/facebook.png"></a>
						<a href="http://www.twitter.com"><img src="Slike/Twitter.png"></a>
						<a href="http://www.google.com"><img src="Slike/Google +.png"></a>
						<a href="http://www.facebook.com"><img src="Slike/LinkedIn.png"></a>
						<a href="http://www.facebook.com"><img src="Slike/Path.png"></a>
						
					</article>
				</section>
		</footer>
	</body>
</html>