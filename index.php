<?php
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
			<section class="container2">
				<?php
						$query = "SELECT * FROM vijesti WHERE vidiljiv=1";
						$result = mysqli_query($con, $query) or die('Error querying databese.');
						$queryRows = "SELECT COUNT(1) AS counter FROM vijesti WHERE vidljiv=1";
						$resultRows = mysqli_query($con, $queryRows);
						$num = mysqli_fetch_array($resultRows);
						$numOfRows = $num['counter'];
						
						if($numOfRows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
									echo '<section><h3>' . $row['naslov'] . '</h3>
										<h4>' . $row['kratkiSadrzaj'] . '</h4>
										<div id="kategorija">
										<div id="kategorija_naslov">Kategorija: </div>
										<h4>' . $row['kategorija'] . '</h4></div>
										<p>' . $row['sadrzaj'] . '</p></section>';
							}
						}
						else
						{
							echo '<article id="article"><div id="noposts"><h2>Nema vijesti!</h2><br>
									<div id="dodajuredibutton">
									<a href="newss.html">Dodaj vijest</a><a href="administrator.php">Uredi vijesti</a></div></div></article>';
						}
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