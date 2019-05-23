<?php
	session_start();
	$zalogowany = false;
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) $zalogowany = true;
?>

<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, JS,jquery-3, PHP">
	<meta name="author" content="Szymon Mrozowski">
	<meta name="description" content="Projekt na Aplikacje internetowe">
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet"/>
	<link rel="stylesheet" href="Style/style.css">
	<script src="Java/jquery-3.3.1.min.js"></script>
	<script src="Java/zmien_t.js"></script>
	<script src="Java/jscript.js"></script>
	<title> Strona internetowa </title>
</head>
<body>

<?php
if(isset($_SESSION['udanarejestracja']) && $_SESSION['udanarejestracja'] == true){
echo <<< ex
				<div class="rejestracja_block">
					<h2>Dziękujemy za założenie konta na naszej stronie</h2>
					<h3>Możesz teraz zalogowac się na swoje konto</h3>
				</div>
ex;
unset($_SESSION['udanarejestracja']);
}
?>


<div id="contener">
	<div id="top"></div>
	<header>
		<ul class="buttParent">
			<li class="butt" id="menu" ><img id="menu0" src="photos/menu.png" alt="menu"></li>
		</ul>
		<ul id="menu_wys">
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
			<li class="butt" id="profil" ><img id="profil0" src='<?php if($zalogowany==true) echo "photos/loginBlue.png"; else echo "photos/login.png"; ?>' alt="login"></li>
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

    <div class="top_block">
    	<div class="m_art" id="ma" >
			
		<article>
			<a href="muzyka.php">
				<div id="ele0">
					<h3>Muzyka</h3>
					<p>Etiam dignissim malesuada erat, ut lacinia velit pharetra non. Vivamus ac nisl orci. Curabitur tincidunt quam eget tortor convallis accumsan. Aenean et purus purus. Maecenas aliquam mi eu leo varius, ut sodales ante tincidunt.</p>
			    </div>
			</a>
			<a href="sport.php">
				<div id="ele1">
					<h3>Sport</h3>
					<p>Nunc tincidunt dui vel mauris pretium, nec feugiat mauris vestibulum. Nunc id ipsum sit amet arcu placerat tristique. Suspendisse iaculis libero vel quam pellentesque auctor.</p>
			    </div>
			</a>
			<a href="Nauka.php">
				<div id="ele2">
					<h3>Nauka</h3>
					<p>Maecenas vel urna tempor, molestie lectus nec, aliquet sem. Proin sit amet suscipit neque. Curabitur sodales ullamcorper tortor non tincidunt. Aliquam placerat vestibulum felis, a sodales ipsum rutrum et.</p>
				</div>
		    </a>
			<a href="Biznes.php">
				<div id="ele3">
					<h3>Biznes</h3>
					<p>Donec imperdiet nulla suscipit, rhoncus lorem sit amet, convallis urna. Proin vel mi vel lectus sodales ultricies sed quis enim. In leo sem, porta sed est eget, interdum fermentum lectus.</p>
			    </div>
			</a>
		</article>
    	</div>
		<div id="przejscie">
			<figure id="back_"><img src="photos/back.png" alt="back"></figure>
			<figure id="next_"><img src="photos/next.png" alt="next"></figure>
		</div>
    </div>

	

    <div class="main_block">
		
			<section id="muzyka">
				<h2 id="h2_m">Muzyka</h2>
				<article class="animsLeft anims">
					<div><img src="photos/m3.jpg" alt="muzyka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims" >
					<div><img src="photos/m4.jpg" alt="muzyka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims">
					<div><img src="photos/m5.jpg" alt="muzyka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/m6.jpg" alt="muzyka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/m7.jpg" alt="muzyka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/m8.jpg" alt="muzyka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
			</section> 
			<section id="sport">
				<h2 id="h2_s">Sport</h2>
				<article class="animsLeft anims">
					<div><img src="photos/s4.jpg" alt="sport"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims">
					<div><img src="photos/s6.jpg" alt="sport"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims">
					<div><img src="photos/s7.jpg" alt="sport"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div ><img src="photos/s8.jpg" alt="sport"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div id="advert">
						<h3>Reklama</h3>
						
						<span>Try Premium account</span>
						<table id="table0">
						  <tr>
						    <th></th>
						    <th>1-month free</th>
						    <th>Download</th>
						    <th>Upload</th>
						  </tr>
						  <tr>
						    <td>Free</td>
						    <td class="koloruj red">x</td>
						    <td>2Mb/s</td>
						    <td class="koloruj">1Mb/s</td>
						  </tr>
						  <tr>
						    <td>5$</td>
						    <td class="koloruj red">x</td>
						    <td>5Mb/s</td>
						    <td class="koloruj">4Mb/s</td>
						  </tr>
						  <tr>
						    <td>10$</td>
						    <td class="koloruj gree">o</td>
						    <td>9Mb/s</td>
						    <td class="koloruj">5Mb/s</td>
						  </tr>
						  <tr>
						    <td>25$</td>
						    <td class="koloruj gree">o</td>
						    <td>20Mb/s</td>
						    <td class="koloruj">15Mb/s</td>
						  </tr>
						</table>
					</div>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/s5.jpg" alt="sport"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				
			</section> 
			<section id="nauka">
				<h2 id="h2_n">Nauka</h2>
				<article class="animsLeft anims">
					<div><img src="photos/n.jpg" alt="nauka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims">
			    	<div><img src="photos/n5.jpg" alt="nauka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims">
					<div><img src="photos/n6.jpg" alt="nauka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/n3.jpg" alt="nauka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/n7.jpg" alt="nauka"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				
			</section> 
			<section id="biznes">
				<h2 id="h2_b">Biznes</h2>
				<article class="animsLeft anims">
					<div><img src="photos/b2.jpg" alt="biznes"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims">
					<div><img src="photos/b3.jpg" alt="biznes"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsLeft anims">
					<div><img src="photos/b4.jpg" alt="biznes"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/b5.jpg" alt="biznes"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
				<article class="animsRight anims">
					<div><img src="photos/b6.jpg" alt="biznes"></div>
					<h3>Vestibulum semper</h3>
					<p>Aenean consequat, felis molestie cursus sollicitudin, ex magna hendrerit dolor, vel eleifend dui turpis sit amet tellus. Quisque dignissim augue quis ex volutpat mollis. </p>
				</article>
			</section> 
    </div>

	<aside id="pasek">
		<div id="mobile_">
			<div class="mob_element">
			 	<input class="szukaj" type="text" />
				<p><img class="loupe_pic" src="photos/Loupe-icon.png" alt="Search"></p>
			</div>
			<div class="mob_element">Popularne</div>
			<div class="mob_element" id="more"><img src="photos/more.png" alt="more"></div>
			<div id="more_wys">
				<ul>
					<li>Najnowsze</li>
					<li>Najlepiej oceniane</li>
					<li>Najczesciej ogladane</li>
				</ul>
			</div>
		</div>

		<div id="komp_">
			<div>
				<h4>Wyszukaj</h4> 
			 	<p>
			 		<input class="szukaj" type="text" />
					<span class="loupe"><img class="loupe_pic" src="photos/Loupe-icon.png" alt="Search"></span>
				</p>
			</div>
			<div class="aside_guziki">
				<h4>Sortuj:</h4>
				<p>Popularne</p>
				<p>Najnowsze</p>
				<p>Najlepiej oceniane</p>

			</div>

			<div>
				<nav class="aside_guziki">
					<h4>Nawigacja</h4>
					<a href="#muzyka"><p>Muzyka</p></a>
					<a href="#sport"><p>Sport</p></a>
					<a href="#nauka"><p>Nauka</p></a>
					<a href="#biznes"><p>Biznes</p></a>
				</nav>
			</div>
			<div id="ankieta2">
				<form action="#" method="post">
					<h4>Ankieta</h4>
					
					<p id="ank1">Ile masz lat?</p>
					<label><input type="radio" name="wiek" value="mniej niz 15">mniej niz 15 lat</label><br>
					<label><input type="radio" name="wiek" value="15-17">15-17 lat</label><br>
					<label><input type="radio" name="wiek" value="18-25">18-25 lat</label><br>
					<label><input type="radio" name="wiek" value="26-40">26-40 lat</label><br>
					<label><input type="radio" name="wiek" value="41-60">41-60 lat</label><br>
					<label><input type="radio" name="wiek" value="wiecej niz 60">wiecej niz 60 lat</label>
				    <br>

					<p id="ank2">Podaj płeć</p>
					<label><input type="radio" name="plec" value="M">Mężczyzna</label><br>
					<label><input type="radio" name="plec" value="K">Kobieta</label><br>

					<p id="ank3">Jakie tematy najczęściej oglądasz na naszej stronie?</p>
					<label><input type="checkbox" name="temat" value="Muzyka">Muzyka</label><br>
					<label><input type="checkbox" name="temat" value="Sport">Sport</label><br>
					<label><input type="checkbox" name="temat" value="Nauka">Nauka</label><br>
					<label><input type="checkbox" name="temat" value="Biznes">Biznes</label><br>

					<input id="a_sub" type="button"  value="Wyślij">
			    </form>
			    <div id="error_ank"></div>
			</div>
			<div>
				<h4>Reklama</h4>
				<p><img class="boczne_rekl" src="photos/r.jpg" alt="Reklama"></p>
			</div>
			<div>
				<h4>Reklama</h4>
				<p><img class="boczne_rekl" src="photos/r2.jpg" alt="Reklama"></p>
			</div>
		</div>
	</aside>
	
	
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