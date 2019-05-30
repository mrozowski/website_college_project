var n=0;
var wyn="";
var myInterval3;
var stageIndex = 1;
function g_over() {
    n++;

document.getElementById("okno3").innerHTML = n;
}

function watchOutBoy(){
    //zapamietaj skin węża
    var  myR = s_colorR;
	var  myG = s_colorG;
    var  myB = s_colorB;
    
     myInterval3 = setInterval(function(){
        s_colorR = 173;
        s_colorG = 34;
        s_colorB = 34
        setTimeout(function(){
            s_colorR = myR;
            s_colorG = myG;
            s_colorB = myB;
        }, 150); 
      }, 300);
   
}

function offAnimation(){
    document.getElementsByTagName("canvas")[0].classList.remove('Right30');
    document.getElementsByTagName("canvas")[0].classList.remove('Left30');
    document.getElementsByTagName("canvas")[0].classList.remove('scaleMe');
    document.getElementsByTagName("canvas")[0].classList.remove('upIsDown');
    document.getElementsByClassName('finalStage')[0].classList.remove('in-view');
    document.getElementById("okno2").classList.remove('dead');
    clearInterval(myInterval);
    clearInterval(myInterval2);
}

//wraca do poczatkowych ustawien
function defaultGame(){
    rate = 17;
    canI = false;
    finalAnimation = false;
    stageIndex = 1;
   
   
     offAnimation();
    document.getElementsByTagName("section")[0].innerHTML = "";
    changeStage();
    
    b_colorR = 53;
    b_colorG = 53;
    b_colorB = 53;

    s_colorR = 255;
    s_colorG = 255;
    s_colorB = 255;
}

function changeStage(){
    
    document.getElementsByClassName('stage')[0].classList.remove('stageAnim');
    document.getElementsByClassName('stage')[0].innerHTML = stageIndex++;
    setTimeout(function(){
		document.getElementsByClassName('stage')[0].classList.add('stageAnim');
    }, 400);
    
}