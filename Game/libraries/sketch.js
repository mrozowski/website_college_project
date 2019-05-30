
var music = new Audio("sounds/grind.mp3");
music.volume = 0.08;
//music.muted = true;//
var deathSound = new Audio("sounds/youDied.mp3");

var rate = 17; //predkosc weża (klatki na sekunde im wiecej tym szybszy wąż)
var buttonPlay = document.getElementById("bPlay");
var buttonPlay2 = document.getElementById("bStop");

var menubuttonPlay = document.getElementById("PlaySong");
var menubuttonMute = document.getElementById("MuteSong");
var menubuttonCancel = document.getElementById("CancelS");

var animation = true;
var canI = false;  //pomocniczna wylącza animacje po smierci
var finalAnimation = false; //pomocnicza do finału
function sound(){
	var playPromise = music.play();
}

function soundOfDeath(){
	var playPromise = deathSound.play();
}

menubuttonPlay.addEventListener("click", function(){
	music.muted = false;
	deathSound.muted = true;
});

menubuttonMute.addEventListener("click", function(){
	music.muted = true;
	deathSound.muted = true;
});

menubuttonCancel.addEventListener("click", function(){
	window.location.href = '../index.php';
});

music.addEventListener('ended', function() {
    this.currentTime = 0;
    this.play();
}, false);




buttonPlay.addEventListener("click", function(){
	document.getElementsByClassName('playAgame')[0].classList.add('disapear');
	setTimeout(function(){
		document.getElementsByClassName('playAgame')[0].classList.add('disapear2');
	}, 500);
	sound();

});

buttonPlay2.addEventListener("click", function(){
	window.location.href = '../index.php';
	
});


function shakeBoard(){
	document.getElementsByTagName("canvas")[0].classList.add('shakeMe');
	setTimeout(function(){
			document.getElementsByTagName("canvas")[0].classList.remove('shakeMe');
	}, 500);
}

function stopSnake(a){
	rate = 1; //zatrzymanie węża na czas animacji
setTimeout(function(){
	rate = 17;
}, a);
}

function UniverseInRevers(){

	//stopSnake(100); //zatrzymaj węża na 100ms
	rate = 12; //spowolnienie
	animation = false;
	document.getElementsByTagName("canvas")[0].classList.add('rotateMe');
	
	setTimeout(function(){
		//stopSnake(100);
		if(!canI) return;
		rate = 17; 
			document.getElementsByTagName("canvas")[0].classList.remove('rotateMe');
			animation = true;
			machineAnimation = false;
	}, 10000);
	
}

var myInterval;

function PumpItUp(){

	myInterval = setInterval(function(){
		document.getElementsByTagName("canvas")[0].classList.add('scaleMe');
		setTimeout(function(){
			document.getElementsByTagName("canvas")[0].classList.remove('scaleMe');
	}, 250);
	}, 550);

	setTimeout(function(){
		clearInterval(myInterval);
		machineAnimation = false;  //wskazuje ze animacja sie zakonczyla
}, 10000);
}



function RunInto90s(){
	rate = 27; //przyspieszenie 
	setTimeout(function(){
		rate = 17;
		machineAnimation = false;  //wskazuje ze animacja sie zakonczyla
}, 8000); //wrócenie do normalnej prędkości po 8 sekundach
}



function SlowDownMan(){
	rate = 7; //zwolnienie
	setTimeout(function(){
		rate = 17;
		machineAnimation = false;  //wskazuje ze animacja sie zakonczyla
	}, 8000); //wrócenie do normalnej prędkości po 8 sekundach
}

function TurnMeLeftHoney(){	
	document.getElementsByTagName("canvas")[0].classList.add('Left30');
		setTimeout(function(){
			document.getElementsByTagName("canvas")[0].classList.remove('Left30');
			animation = true;
			machineAnimation = false;  //wskazuje ze animacja sie zakonczyla
	}, 7000);
	
}

function TurnMeRightHoney(){	
	document.getElementsByTagName("canvas")[0].classList.add('Right30');
		setTimeout(function(){
			document.getElementsByTagName("canvas")[0].classList.remove('Right30');
			animation = true;
			machineAnimation = false;  //wskazuje ze animacja sie zakonczyla
	}, 7000);
	
}

function losuj(){
	var r = parseInt(random(6));
	
	if(r==0) PumpItUp(); //bijąca plansza
	else if(r==1) RunInto90s(); //przyspieszenie węża
	else if(r==2) SlowDownMan(); //zwolnienie węża
	else if(r==3){ animation = false; TurnMeLeftHoney();   }  //animationOFF = false po to by inne animacje sie nie właczały bo sie sypie :D
	else if(r==4){ animation = false; TurnMeRightHoney();  }
	else if(r==5){ animation = false; UniverseInRevers();  }
}


var myInterval2;
var machineAnimation = false;
function startTimeMachine(){
	if(!canI || finalAnimation) return; //jezeli wąż umarł lub jest aktywany ostateczny poziom to nie uruchamiaj 
	machineAnimation = true;
		watchOutBoy(); //zmianijący się kolor węża jako ostrzeżenie
			setTimeout(function(){
				losuj();
				clearInterval(myInterval3); //wylaczenie watchOutBoy()
			}, 3000);
		
	
	var howQuick = random(5) + 1;
	setTimeout(function(){
		if(!canI || finalAnimation) return;
		startTimeMachine();
	}, 19500 + howQuick*1000); //kazdy kolejny efekt bedze zaczynał się co 19 - 24sekund (trwa 7-8s) "aż do śmierci"
}



function upSideDown(){
	stopSnake(100);
	document.getElementsByTagName("canvas")[0].classList.add('upIsDown');
		setTimeout(function(){
			document.getElementsByTagName("canvas")[0].classList.remove('upIsDown');
			stopSnake(100);
			document.getElementsByClassName('finalStage')[0].innerText = "";
			
			document.getElementsByClassName('finalStage')[0].classList.remove('in-view');
			finalAnimation = false;
	}, 10000);
}

function waitMrWolowitz(){
var myinterval09 = setInterval(function(){
	//co sekunde sprawdzaj czy animacja sie wyłaczyła
		if(!machineAnimation){
			finalStage();
			clearInterval(myinterval09);
		}
	}, 1000);
}

function finalStage(){
	 //jezeli jest włączona animacja z timeMachine to poczekaj do jej zakonczenia i wtedy uruchom finalStage()
	 if(machineAnimation){
	  	waitMrWolowitz();  
		  return;
	 }
	 animation = false; //wylacza inne mniejsze animacje
	 finalAnimation = true;
	 offAnimation(); //przygotowania
	 
   var temp = 5;
	canI = true;
	 document.getElementsByClassName('finalStage')[0].innerText = "Final Stage :)";
   document.getElementsByClassName('finalStage')[0].classList.add('in-view');
   myInterval = setInterval(function(){
	  document.getElementsByTagName("section")[0].innerHTML = temp--;
	  if(temp==0) clearInterval(myInterval);
	}, 1000);

	setTimeout(function(){
		document.getElementsByTagName("section")[0].innerHTML = "GO!";
		if(!canI) return;
			upSideDown();
	}, 6000);


	setTimeout(function(){
		document.getElementsByTagName("section")[0].innerHTML = ""; //wyczyść
    }, 7500);

}



var b_colorR = 53;
var b_colorG = 53;
var b_colorB = 53;

var s_colorR = 255;
var s_colorG = 255;
var s_colorB = 255;

function changecolors(){
	b_colorR = random(255);
	b_colorG = random(255);
	b_colorB = random(255);


}

function changeSnakecolors(){
	s_colorR = random(255);
	s_colorG = random(255);
	s_colorB = random(255);
}




var s; 		   //snake
var scl = 30; //skala
var food;    //jedzenie
var theBestResult = 0;
function setup() {
	
 createCanvas(600, 600);
 s = new Snake();     //tworzy węża
 frameRate(rate);      //ogranicza fps'y do y klatek
 pickLocation();    //ustawia jedzenie na planszy
 
 changeStage();
 

}



function pickLocation() {      
	var cols = floor(width/scl);   			     //ogranicza pole po ktorym porusza  
	var rows = floor(height/scl);               //sie wąż do widzianej planszy 
	var foodX = floor(random(cols));
	var foodY = floor(random(rows));
	var check = false;
	
	
	food = createVector(foodX, foodY); //tworzy jedzenie w randomowym miejscu na planszy
	
	//proba sprawdzenia by jedzienie nie nakladało sie na węża
	// for(var i=0; i<s.tail.length; i++){
	// 	console.dir(s.tail[i]);
	// 	console.log("ponizej jest food");
	// 	console.dir(food.getXx());
	
		
	//   if(food.x == s.tail[i].x && food.y == s.tail[i].y){
	// 			console.log("nachodzi");
	// 			pickLocation();
	// 		}
	// }
	
	food.mult(scl);
	
}



function draw() {
	  frameRate(rate);
	  background(b_colorR, b_colorG, b_colorB); //kolor tla
	   //uruchamia funkcje
	  s.death();      
	  s.update();
	  s.show();
      

		 if (s.eat(food)) {   //jeśli wąż zje obiad,
		 		pickLocation();  // ustaw jedzenie w nowej lokacji
		 }

	  fill(255, 0, 100);  //kolor jedzenie
	  rect(food.x, food.y, scl, scl);
}


function keyPressed() {   //poruszanie sie wężem

		if(keyCode === UP_ARROW && s.yspeed!=1) {
			s.dir(0, -1);
		} else if(keyCode === DOWN_ARROW && s.yspeed!=-1){
			s.dir(0, 1);
		} else if(keyCode === LEFT_ARROW && s.xspeed!=1){
			s.dir(-1, 0);
		} else if(keyCode === RIGHT_ARROW && s.xspeed!=-1){
			s.dir(1, 0);
		}

		
}
function Snake() {  //tworzenie węża
	this.x = 300;      //pozycja weża
	this.y = 300;
	this.xspeed = 0;  
	this.yspeed = 0;
	this.total = 0;   //historia weża, gdzie był wczesniej i tam ustawia kolejne segmenty ogona
	this.tail = [];  //ogon weża
    
	    this.dir = function(x, y) {
	    	this.xspeed = x;
	    	this.yspeed = y;
	    }

            //jeśli odleglosc miedzy weżem, a jedzeniem jest
           //mniejsza niż 1 piksel
          //zwróć true
     this.eat = function(pos) {
    	var d = dist(this.x, this.y, pos.x, pos.y);
    	if(d<1) {   
    		this.total++;
    		if(theBestResult < this.total) theBestResult = this.total;
    		document.getElementById("okno7").innerHTML = theBestResult;  
				document.getElementById("okno5").innerHTML = this.total;  
			
				if(this.total%5==0){ 
					changecolors(); 
					
				}
				if(this.total%5==0 && this.total<=10) changeStage(); //przy 5 zmien na 2lvl przy 10 na 3lvl
				if(this.total>=10 && this.total%10==0) changeSnakecolors();
				if(this.total>=10 && this.total%10==0 && animation) shakeBoard();
				if(this.total==18) {canI = true; startTimeMachine(); changeStage(); } //wskakuje na wyższy poziom 4lvl
				if(this.total>=36 && this.total%12==0){ finalStage(); changeStage();} //nie przejdziesz 5lvl
    		return true;
    	} else{             
    		return false;
    	}
    }

 	this.death = function() {
 		
 		for (var i = 0; i < this.tail.length; i++) {
 			var pos = this.tail[i];                        //pos - pozycja segmentów ogona węża
 			var d = dist(this.x, this.y, pos.x, pos.y);   //this.x, this.y pozycja głowy weża,
 			
 			if (d<1) {  
				

				 g_over();            //Wypisz przegrałes
				 defaultGame();
				 soundOfDeath();
        this.total = 0;                      //wyzeruj historie weża 
 				this.tail = [];                     //wyzeruj ogon
 				document.getElementById("okno5").innerHTML = this.total;  
 			}
 		}
 	}


	this.update = function() {
		if(this.total === this.tail.length){             //jesli historia weza jest równa długosci ogona

			for(var i = 0; i<this.tail.length-1; i++){
				this.tail[i] = this.tail[i+1];
		       }
		 }
		
		this.tail[this.total-1] = createVector(this.x, this.y);

		this.x = this.x + this.xspeed*scl;
		this.y = this.y + this.yspeed*scl;

		this.x = constrain(this.x, 0, width-scl);                //ogranicze plansze do widzalnego pola
		this.y = constrain(this.y, 0, height-scl);
	}

	this.show = function() {
		fill(s_colorR, s_colorG, s_colorB);
		
		for(var i = 0; i<this.tail.length; i++){
			rect(this.tail[i].x, this.tail[i].y, scl, scl);
		}
     	rect(this.x, this.y, scl, scl);
		
		
	}

}

