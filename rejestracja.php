<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: index.php');
		exit();
	}

	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		
		$nick = $_POST['nick'];
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];

		//Sprawdzenie długości nicka
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}

		//Sprawdzenie poprawności znaków nicka
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		//Sprawdzenie długości imienia
		if ((strlen($imie)<2) || (strlen($imie)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_imie']="Imie musi posiadać od 2 do 20 znaków!";
		}

		//Sprawdzenie długości nazwiska
		if ((strlen($nazwisko)<2) || (strlen($nazwisko)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko']="Nazwisko musi posiadać od 2 do 20 znaków!";
		}
		

		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
		//re_captcha
		$sekret = "6LeUHKQUAAAAAN_7N2YRKitxF8lkgB8iwfulCJ-L";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_captcha']="Potwierdź, że nie jesteś botem!";
		}		
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_imie'] = $imie;
		$_SESSION['fr_nazwisko'] = $nazwisko;
		$_SESSION['fr_email'] = $email;


		
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (
						NULL, '$nick', '$haslo_hash','$imie','$nazwisko','$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: index.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:rgb(235, 52, 20);">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>


<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="UTF-8" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, JS,jquery-3, PHP">
	<meta name="author" content="Szymon Mrozowski">
	<meta name="description" content="Projekt Zaliczeniowy">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet"/>
    
	<link rel="stylesheet" type="text/css" href="Style/style.css">
	<link rel="stylesheet" type="text/css" href="Style/styleK.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
				<li><a href="game/index.php">Game</a></li>
				<li><a href="Rekopis/index.html">Rękopis</a></li>
				<li><a href="kontakt.php">Kontakt</a></li>
				<li><a href="#">Ustawienia</a></li>
			</ul>
		    <nav>
				<ul>
					<li class="butt"><a href="http://www.kul.pl/">KUL</a></li>
					<li class="butt"><a href="Rekopis/index.html">Rękopis</a></li>
					<li class="logo"><a href="#top"> </a></li>
					<li class="butt"><a href="game/index.php">Game</a></li>
					<li class="butt"><a href="kontakt.php">Kontakt</a></li>
				</ul>
		    </nav>
			<ul class="buttParent">
				<li class="butt" id="profil" ><img id="profil0" src="photos/login.png" alt="login"></li>
			</ul>
			<ul id="profil_wys">
					<?php
						
						if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
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
EXCERPT;
							
						}
			
					
						if(isset($_SESSION['blad'])){ echo "<li><p>".$_SESSION['blad']."</p></li>"; unset($_SESSION['blad']); }
			
			?>
			</ul>
		</header>
		
		<section class="m_kontakt rejestracja">
		
	
			<form action="" method="POST">
				<h3>Załóż konto</h3>
				<ul>	

					
					<li><input type="text" class="input_k"  name="nick" placeholder="Nick" value="<?php
					 	if (isset($_SESSION['fr_nick'])) { echo $_SESSION['fr_nick']; unset($_SESSION['fr_nick']); }
				    ?>" required> <span class="reg_bar"></span></li>			
		        				
					<?php	if(isset($_SESSION['e_nick'])){ echo "<p class='error_'>".$_SESSION['e_nick']."</p>";  unset($_SESSION['e_nick']);}?>

					<li><input type="text" class="input_k" name="imie"  placeholder="Imie" required value="<?php
					 	if (isset($_SESSION['fr_imie'])) { echo $_SESSION['fr_imie']; unset($_SESSION['fr_imie']); }
				    ?>"><span class="reg_bar"></span></li>	
					<?php	if(isset($_SESSION['e_imie'])){ echo "<p class='error_'>".$_SESSION['e_imie']."</p>"; unset($_SESSION['e_imie']);}?>

					<li><input type="text" class="input_k" name="nazwisko"  placeholder="Nazwisko" required value="<?php
					 	if (isset($_SESSION['fr_nazwisko'])) { echo $_SESSION['fr_nazwisko']; unset($_SESSION['fr_nazwisko']); }
				    ?>"><span class="reg_bar"></span></li>	
					<?php	if(isset($_SESSION['e_nazwisko'])){ echo "<p class='error_'>".$_SESSION['e_nazwisko']."</p>"; unset($_SESSION['e_nazwisko']);}?>

					<li><input type="text" class="input_k" name="email"  placeholder="E-mail" required value="<?php
					 	if (isset($_SESSION['fr_email'])) { echo $_SESSION['fr_email']; unset($_SESSION['fr_email']); }
				    ?>"><span class="reg_bar"></span></li>
					<?php	if(isset($_SESSION['e_email'])){ echo "<p class='error_'>".$_SESSION['e_email']."</p>"; unset($_SESSION['e_email']);}?>

					<li><input type="password" class="input_k" name="haslo1"  placeholder="Hasło" required> <span class="reg_bar"></span></li>
					<?php	if(isset($_SESSION['e_haslo'])){ echo "<p class='error_'>".$_SESSION['e_haslo']."</p>";	 unset($_SESSION['e_haslo']);}?>

					<li><input type="password" class="input_k"  placeholder="Powtórz hasło" name="haslo2" required><span class="reg_bar"></span></li>

					<li><label>
						<input type="checkbox" name="regulamin" <?php
						if (isset($_SESSION['fr_regulamin']))
						{
							echo "checked";
							unset($_SESSION['fr_regulamin']);
						}
						?>/> Akceptuję regulamin
					</label></li>
					<?php	if(isset($_SESSION['e_regulamin'])){ echo "<p class='error_'>".$_SESSION['e_regulamin']."</p>";
					unset($_SESSION['e_regulamin']);} ?>
					<li><div class="g-recaptcha" data-sitekey="6LeUHKQUAAAAALff-FmD6DhyNzyGpCRfNdFyge4-"></div></li>
					<?php	if(isset($_SESSION['e_captcha'])){ echo "<p class='error_'>".$_SESSION['e_captcha']."</p>"; 
						unset($_SESSION['e_captcha']);}
					?>

					<input class="wyslij_rej" type="submit" value="Załóż konto">
					
					
				</ul>
			</form>
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


