<?php 

	session_start();
	$zalogowany = false;
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) $zalogowany = true;



	$email = $_POST["email"];
	$temat = $_POST["temat"];
	$tresc = $_POST['tresc'];

	
	$ok = true;


	$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
	if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email)){
		$ok = false;
		$_SESSION['er_email'] = true;
	}

	if((strlen($tresc)<3) || (strlen($tresc)>500) || (strlen($temat)<1) || (strlen($temat)>50))
	{
		$ok = false;
		$_SESSION['e_form'] = '<span style="color:rgb(235, 52, 20);">Wprowadz poprawne dane! </span>';
	} 
	if(!$ok){
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_temat'] = $temat;
		$_SESSION['fr_tresc'] = $tresc;
		$_SESSION['fr_email'] = $email;

		header('Location: kontakt.php');
	} 

	//Jeżeli wszystko jest dobrze to logujemy się do bazy

	require_once "connect.php";
	try{
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else{
				
				$date = date('Y-m-d H:i:s a', time());
					if(!$polaczenie->query("INSERT INTO message_ VALUES (
						NULL, '$email', '$temat', '$tresc','$date')")){
							$ok = false;
							throw new Exception($polaczenie->error);
						}
				$polaczenie->close();
			}
	}
	catch(Exception $e){
		echo '<span style="color:rgb(235, 52, 20);">Błąd serwera! Przepraszamy za niedogodności i prosimy o wysłanie wiadomości w innym terminie!</span>';
		echo '<br />Informacja developerska: '.$e;
	}
?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="UTF-8" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Form">
	<meta name="keywords" content="HTML, CSS, JS,jquery-3, PHP">
	<meta name="author" content="Szymon Mrozowski">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="Style/styleK.css">
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    
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
		
		<section id="wiadomosc">
			<div>
		<?php
	
		if($ok){
			echo "<h3>Dziekujemy za wysłanie wiadomosci,</h3> <br> <h4>Odpowiemy tak szybko jak to możliwe.</h4>";
			echo "<p><a href='index.php'>Wróc na strone główną</a></p>";
		}
		else {
		echo "Nie udało się wysłać wiadomości";
		echo "<p><a href='kontakt.php'>Cofnij</a></p>";
    	}
		?>
		</div>
		</section>


    </div>

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

</body>
<html>