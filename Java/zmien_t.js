
var tImg = ['photos/m2.jpg','photos/s3.jpg','photos/n4.jpg','photos/b.jpg'];
        
var n = 0;
var i = 1;
var timeout = 5000;


document.addEventListener("DOMContentLoaded", function() {

    autom_text();

    function zmien_obrazek(){ //funkcja zmieniajaca obrazek i tekst oraz zeruje interwał

             var main_art = document.getElementById('ma');
             main_art.style.backgroundImage = 'url('+tImg[n]+')';  
             autom_text();      
             clearInterval(auto); 
             auto = setInterval(function() {sprawdz(); zmien_obrazek();}, timeout);
     }

       var auto = setInterval(function() {sprawdz(); zmien_obrazek();}, timeout); //automatycznie zmienianie tematu (obrazka i tekstu) po czasie timeout


    function sprawdz(){
             if(n==3) {  
                 i=n;
                 n=0;
            }
            else {
                n++;
                i=n-1;
            }
    }

     function autom_text(){  //zmiana tekstu
            document.getElementById('ele'+n+'').style.display="block"; 

            document.getElementById('ele'+i+'').style.display="none";  
     };



    //obsługa przycisków zmiany tematu

    var back = document.getElementById('back_');  //przycisk wstecz
    var next = document.getElementById('next_');  //przycisk dalej

    back.addEventListener('click', function(){
            if(n==0) {
                 n=3; 
                 i=0; 
            }
            else {
                i=n;
                n--;          
            } 
            zmien_obrazek();
            
    });


    next.addEventListener('click', function(){
        sprawdz();
        zmien_obrazek();
        
    });


});