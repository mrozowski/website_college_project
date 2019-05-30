

<html>
<head>
  <meta charset="UTF-8">


  <link rel="Stylesheet" type="text/css" href="style/style.css" />

</head>
<?php
	session_start();
	
  if(!((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))){
    echo '<div class="nie_zalogowany"><h3>Musisz posiadać konto aby moć korzystać z tej aplikacji!.</h4>';
    echo "<p><a href='../index.php'>Wróc na strone główną</a></p></div>";
    
    exit();
    
   
  }
 
  
?>
<body>
  <div class="worning">
    <p>Aplikacja nie może być uruchomiona na tak małym ekranie</p>
    <p><a href='../index.php'>Wróc na strone główną</a></p>
  </div>
  <div class="playAgame">
    <button id="bPlay" autofocus>Play</button>
    <button id="bStop">Cancel</button>
  </div>
  <div class="finalStage"></div>
  <section></section>
<div id="okno">

<span id="okno2">d e a t h s</span>
	<div id="okno3">0</div>

<span id="okno4"> T a i l</span>
  <div id="okno5">0</div>

<div id="okno6">The Best Score:</div>
<div id="okno7">0</div>
<div class="guziki">
  <button id="PlaySong">Play</button>
  <button id="MuteSong">Mute</button>
  <button id="CancelS">Cancel</button>
</div>
<span class="lvl">level</span>
<div class="stage"></div>
    
</div>

<script language="javascript" type="text/javascript" src="libraries/p5.js"></script>
<script language="javascript" type="text/javascript" src="libraries/sketch.js"></script>
<script language="javascript" type="text/javascript" src="libraries/g_over.js"></script>
</body>
</html>