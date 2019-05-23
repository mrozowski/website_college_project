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
	<meta name="description" content="Kontakt">
	<meta name="keywords" content="HTML, CSS, JS,jquery-3, PHP">
	<meta name="author" content="Szymon Mrozowski">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <link rel="stylesheet" type="text/css" href="Style/styleK.css">
    <script src="Java/jquery-3.3.1.min.js"></script>
	<script src="Java/jscript.js"> </script>
   
    <title> Kontakt </title>
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
				<ul>
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
		
		<section class="m_kontakt">

			<form action="formularz.php" method="POST">
				<h3>Kontakt</h3>
			<ul>
				
			<?php	if(isset($_SESSION['er_email']) && $_SESSION['er_email'] == true)
				echo '<li style="color: red"> E-mail </li>'; 
			else echo '<li> E-mail </li>' ;?>
				<li><input type="text" class="input_k" name="email" required value="<?php
					 	if (isset($_SESSION['fr_email'])) { echo $_SESSION['fr_email']; unset($_SESSION['fr_email']); }
				    ?>"></li>	
				<?php	if(isset($_SESSION['er_email']) && $_SESSION['er_email'] == true){ 
					echo '<p class="error_"> Podaj poprawny adres email </p>'; 
					unset($_SESSION['er_email']); }
				?>
						
				<li>Temat</li>
				<li><input type="text" class="input_k" name="temat" required value="<?php
					 	if (isset($_SESSION['fr_temat'])) { echo $_SESSION['fr_temat']; unset($_SESSION['fr_temat']); }
				    ?>"> </li>							
				<li>Treść</li>
				<li><textarea id="tresc" name="tresc" required><?php
					 	if (isset($_SESSION['fr_tresc'])) { echo $_SESSION['fr_tresc']; unset($_SESSION['fr_tresc']); }
					?>
				</textarea></li>			    
				<li><input type="submit" id="g_send" value="Wyślij"></li>
			</ul>
			</form>
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