<?php
	$con = mysqli_connect("localhost","root","","mojastranica") or die ("Error connecting to MySQL server.");

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
			<section class="container2">
					<?php
							$naslov = $_POST['naslov'];
							$sazetak = $_POST['kratkiSadrzaj'];
							$kategorija = $_POST['kategorija'];
							$opis = $_POST['sadrzaj'];
							$vidljivo = isset($_POST['prikazi']);
						
							echo '<section><h3>' . $naslov . '</h3>
										<h4>' . $sazetak . '</h4>
										<div id="kategorija">
										<div id="kategorija_naslov">Kategorija: </div>
										<h4>' . $kategorija . '</h4></div>
										<p>' . $opis . '</p></section>';
						
							if ($vidljivo)
							{
								echo '<div id="vidljivost">Vijest nije skrivena</div>';
							}
							else
							{
								echo '<div id="vidljivost">Vijest označena kao skrivena</div>';
							}
							
							$query = "INSERT INTO vijesti (naslov, kratkiSadrzaj, sadrzaj, kategorija, vidljiv) 
								VALUES ('$naslov','$sazetak','$opis','$kategorija','$vidljivo')";
							$result = mysqli_query($con, $query) or die("Error querying database");
							mysqli_close($con);
						?>

			</section>
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