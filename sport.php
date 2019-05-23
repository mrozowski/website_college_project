<?php
	session_start();
	$zalogowany = false;
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) $zalogowany = true;
?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="UTF-8" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Sport">
	<meta name="keywords" content="HTML, CSS, JS,jquery-3, PHP">
	<meta name="author" content="Szymon Mrozowski">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <link rel="stylesheet" type="text/css" href="Style/style_article.css">
    <script src="Java/jquery-3.3.1.min.js"></script>
	<script src="Java/jscript.js"> </script>
   
    <title> Sport </title>
</head>
<body>
	<div id="contener">
		<div id="top"></div>
		<header>
				<ul class="buttParent">
					<li class="butt" id="menu" ><img id="menu0" src="photos/menu.png" alt="menu"></li>
				</ul>
				<ul id="menu_wys">
					<li><a href="index.php">Strona główna</a></li>
					<li><a href="http://www.kul.pl/">KUL</a></li>
					<li><a href="https://allegro.pl/">Sklep</a></li>
					<li><a href="Rekopis/index.html">Rękopis</a></li>
					<li><a href="kontakt.php">Kontakt</a></li>
					<li><a href="#">Ustawienia</a></li>
				</ul>
				<nav>
					<ul >
						<li class="butt"><a href="http://www.kul.pl/">KUL</a></li>
						<li class="butt"><a href="Rekopis/index.html">Rękopis</a></li>
						<li class="logo"><a href="#top"> </a></li>
						<li class="butt"><a href="https://allegro.pl/">Sklep</a></li>
						<li class="butt"><a href="kontakt.php">Kontakt</a></li>
					</ul>
				</nav>
				<ul class="buttParent">
				<li class="butt" id="profil" ><img id="profil0" src='<?php if($zalogowany) echo "photos/loginBlue.png"; else echo "photos/login.png"; ?>' alt="login"></li>
				</ul>
				<ul id="profil_wys">
				<?php
					
					if ($zalogowany)
					{
						echo "<li><p> Witaj ".$_SESSION['user']."!</p></li>";
						echo '<li><a href="logout.php"> Wyloguj się </a></li>';
					}
					else{				
echo <<<EXCERPT
					<li>Zaloguj się</li>
					<form action="logowanie.php" method="post">
						<li><input type="text" id="login" name="login" placeholder="Nick"><span class="bar"></span></li>
						<li><input type="password" id="haslo" name="haslo" placeholder="Hasło"><span class="bar"></span></li>
						<li><input type="submit" value="Zaloguj"></li>
					</form>
					<li><a href="rejestracja.php">Zarejestruj się!</a></li>
EXCERPT;
						
					}
		
				
					if(isset($_SESSION['blad'])){ echo "<li><p>".$_SESSION['blad']."</p></li>"; unset($_SESSION['blad']); }
		
		?>
					
				</ul>
			</header>
		<figure class="main_theme" id="sport_theme">
			<div>
				<h3>Sport</h3>
				<p>Vivamus ac nisl orci. Curabitur tincidunt.
					Nullam commodo ex commodo massa elementum tempus. Nulla rhoncus porttitor nisi at lobortis. Maecenas dapibus ipsum quam, non aliquam nisi pulvinar et. Fusce pellentesque lectus quis libero imperdiet</p>
			</div>
		</figure>

		<section class="artykul_">
				
				<p>
					Etiam dignissim malesuada erat, ut lacinia velit pharetra non. Vivamus ac nisl orci. Curabitur tincidunt quam eget tortor convallis accumsan. Aenean et purus purus. Maecenas aliquam mi eu leo varius, ut sodales ante tincidunt.Etiam dignissim malesuada erat, ut lacinia velit pharetra non. Vivamus ac nisl orci. Curabitur tincidunt quam eget tortor convallis accumsan. Aenean et purus purus. Maecenas aliquam mi eu leo varius, ut sodales ante tincidunt.Etiam dignissim malesuada erat, ut lacinia velit pharetra non. Vivamus ac nisl orci. Curabitur tincidunt quam eget tortor convallis accumsan. Aenean et purus purus. Maecenas aliquam mi eu leo varius, ut sodales ante tincidunt.
				</p>

				<img src="photos/s5.jpg" alt="obrazek">
				<p>
					<b>Vivamus ac nisl orci.</b> Curabitur tincidunt quam eget tortor convallis accumsan. Aenean et purus purus. Maecenas aliquam mi eu leo varius, Aenean et purus purus. Maecenas aliquam mi eu leo varius, ut sodales ante tincidunt.Etiam dignissim malesuada erat, ut lacinia velit pharetra non. Vivamus ac nisl orci. Etiam dignissim malesuada erat, ut lacinia velit pharetra non. Vivamus ac nisl orci. Curabitur tincidunt.
					Nullam commodo ex commodo massa elementum tempus. Nulla rhoncus porttitor nisi at lobortis. Maecenas dapibus ipsum quam, non aliquam nisi pulvinar et. Fusce pellentesque lectus quis libero imperdiet, sed ultrices diam pulvinar. Etiam in dui dapibus, volutpat velit non, placerat enim. Aenean ac ex finibus, condimentum nisi tincidunt, gravida ligula. Sed justo eros, dignissim vitae magna eu, dictum dictum erat. Mauris fermentum nisl eu arcu aliquet malesuada. Vestibulum eget placerat eros. Aliquam lobortis magna sed tellus maximus congue nec sed nulla. Praesent nec rutrum arcu.
				</p>
				<h3>Curabitur tincidunt</h3>
				<p>
					Sed vel pulvinar felis. Vestibulum at arcu a diam fermentum ultrices. Etiam scelerisque elit ligula, et commodo risus scelerisque non. Suspendisse quis justo non enim pulvinar elementum ac at nisl. Mauris ut nibh a arcu dapibus sollicitudin. Etiam sed ullamcorper sapien, nec pulvinar nibh. Ut lorem sem, fringilla cursus consectetur sit amet, ultricies nec quam. Donec euismod euismod magna. Sed consectetur nunc nec tellus imperdiet aliquam. Suspendisse eu maximus enim. Maecenas felis enim, gravida convallis imperdiet volutpat, varius non diam. Pellentesque ut est eu neque sollicitudin sagittis eu nec augue.
				</p>
				<div class="lista">
					<p>Fusce pellentesque lectus quis libero imperdiet:</p>
					<ol>
						<li>Mauris fermentum</li>
						<li>Vivamus ac nisl orci</li>
						<li>Etiam dignissim</li>
						<li>Vivamus ac</li>		
					</ol>
				</div>
				<div class="ad_right"><img  src="photos/r2.jpg" alt="reklama"></div>
				<p>
					Nulla rhoncus porttitor nisi at lobortis. Maecenas dapibus ipsum quam, non aliquam nisi pulvinar et. Fusce pellentesque lectus quis libero imperdiet, sed ultrices diam pulvinar. Etiam in dui dapibus, volutpat velit non, placerat enim. Aenean ac ex finibus, condimentum nisi tincidunt, gravida ligula. Sed justo eros, dignissim vitae magna eu, dictum dictum erat. Mauris fermentum nisl eu arcu aliquet malesuada.
				</p>
				
				<p>
					Suspendisse at dui non sapien posuere volutpat. Fusce nec gravida magna. Fusce ac dui sodales, bibendum mauris vitae, varius neque. Nulla facilisi. Cras tristique est ultrices lorem vulputate, in gravida nisi accumsan. Maecenas lorem urna, finibus ut mollis sit amet, dictum eu odio. Duis ut elit quis dolor finibus ultricies vitae quis est. Vivamus quam urna, dignissim quis nunc at, semper ornare metus. Integer consectetur fringilla sodales. Vivamus vitae ultricies augue. Donec feugiat molestie ultrices. Duis ex augue, pulvinar sed egestas nec, ullamcorper sed tortor. Maecenas hendrerit orci ac quam laoreet tincidunt. Suspendisse a facilisis arcu.

					Aenean tempor quis mi consequat porttitor. Nulla orci lorem, pellentesque vitae finibus eget, sodales dapibus ligula. Vestibulum eu pellentesque diam, ut malesuada erat. Pellentesque vel ullamcorper ex. Cras auctor gravida suscipit. Etiam dapibus faucibus lectus, ut vestibulum ex accumsan a. Donec tincidunt rhoncus lectus, elementum malesuada magna feugiat quis. Vivamus ut urna fermentum, ultrices nisl in, tempor dolor. Etiam ac lectus sed est blandit luctus. Proin nec metus a ipsum facilisis lacinia ut finibus nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus.
				</p>

		</section>
	<footer>
		<nav>
			<span><a href="https://www.facebook.com/"><img src="photos/facebook.png" alt="facebook"></a></span>
			<span><a href="https://twitter.com/"><img src="photos/Twitter-icon.png" alt="Twitter"></a></span>
			<span><a href="https://www.instagram.com/"><img src="photos/instagram.png" alt="insta"></a></span>
		</nav>
		<section>
			<h4>Wykonał:</h4>
			<p>Szymon Mrozowski</p>
		</section>
	</footer>

    </div>

   

</body>
</html>