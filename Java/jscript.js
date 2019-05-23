
        
$(document).ready(function(){


//spardzanie wielkosci okna
var width_ = $('html').width();

$(window).resize(function () {
     width_ = $('html').width(); 
});


    if(width_ >= 650){  //funkcja działa tylko przy szerokosci okna >=650px
        
        //ruchome efekty menu
       $('#menu').mouseover(function(){
            $('#menu0').css({"-webkit-transform" : "rotate(180deg)"});
        });
       $('#menu').mouseout(function(){
            $('#menu0').css({"-webkit-transform" : "rotate(0deg)"});
        });

       $('#profil').mouseover(function(){
            $('#profil0').css({"-webkit-transform" : "scale(1.3)"});
        });
       $('#profil').mouseout(function(){
            $('#profil0').css({"-webkit-transform" : "scale(1)"});
        });
    }

    //rozwijane  menu
    var is_click_menu = false;   //ukrywanie menu
    var is_click_profil = false; //ukrawanie menu profilu
    var is_click_more = false;   //ukrywanie zakladki wiecej na telefonie
    var sprmm = true;            //ukrywanie rozwijanych menu kliknieciem gdziekolwiek na stronie

    var mm = $('#menu').click(function(){
        if(!is_click_menu){
            $('#menu_wys').css({"display" : "block"});
            $('#profil_wys').css({"display" : "none"});
            is_click_profil = false;
            is_click_menu = true;
        }
        else{
            $('#menu_wys').css({"display" : "none"});
            is_click_menu = false;
        }
    });

    var pp = $('#profil').click(function(){
        if(!is_click_profil){
            $('#profil_wys').css({"display" : "block"});
            $('#menu_wys').css({"display" : "none"});
            is_click_menu = false;
            is_click_profil = true;
        }
        else{
            $('#profil_wys').css({"display" : "none"});
            is_click_profil = false;
        }
    });

     $('#more').click(function(){
        if(!is_click_more){
            $('#more_wys').css({"display" : "block"});
            is_click_more = true;
        }
        else{
            $('#more_wys').css({"display" : "none"});
            is_click_more = false;
        }
    });
     
     $(document).click(function(){
        var $sprmm = true;
        $('#profil').click(function(){sprmm = true});
        $('#profil_wys').click(function(){sprmm = true});
        $('#menu').click(function(){sprmm = true});
        $('#menu_wys').click(function(){sprmm = true});
        if(!sprmm){
            $('#profil_wys').css({"display" : "none"});
            $('#menu_wys').css({"display" : "none"});
            is_click_profil = false;
            is_click_menu = false;

        }
        sprmm = false;
     });
   
     //Ankieta
     $('#a_sub').click(function(){

     	$isWiek = false; $isPlec = false; $isTemat = false;

        $("input[name=wiek]").each(function(){
     		if(this.checked==true) $isWiek = true;
     		if(!$isWiek) $("#ank1").css("color", "#EB3414");   			
     		else $("#ank1").css("color", "#CCC"); 
     	});
     	
     	$("input[name=plec]").each(function(){
     		if(this.checked==true) $isPlec = true;
     		if(!$isPlec) $("#ank2").css("color", "#EB3414");   			
     		else $("#ank2").css("color", "#CCC");      		
     	});

     	$("input[name=temat]").each(function(){
     		if(this.checked==true) $isTemat = true;
     		if(!$isTemat) $("#ank3").css("color", "#EB3414");   			
     		else $("#ank3").css("color", "#CCC"); 
     	});
     	
        if($isWiek && $isPlec && $isTemat){
       		 $('#ankieta2').html("Dziękujemy za wypełnienie ankiety.");
        }
        else{
        	 $('#error_ank').html("Prosze wypełnić zaznaczone pola");
        	 $('#error_ank').css("transform", "translateX(0)");
        }
   
     })



     //animacje elementow przy scrollowaniu

     var $anims = $('.anims');
     var $window = $(window);
     
     function check_if_in_view() {
       var window_height = $window.height();
       var window_top_position = $window.scrollTop();
       var window_bottom_position = (window_top_position + window_height);
      
       $.each($anims, function() {
         var $element = $(this);
         var element_height = $element.outerHeight();
         var element_top_position = $element.offset().top;
         var element_bottom_position = (element_top_position + element_height);
      
         //sprawdz czy ten element jest widoczny
         if ((element_bottom_position >= window_top_position) &&
             (element_top_position <= window_bottom_position)) {
           $element.addClass('in-view');
         } else {
           $element.removeClass('in-view');
         }
       });
     }
     
     $window.on('scroll resize', check_if_in_view);
     $window.trigger('scroll'); 



});