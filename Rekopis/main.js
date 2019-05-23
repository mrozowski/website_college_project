$(document).ready(function(){
    var header = $("#nmenu");
    var h = $(window).height();
    $(document).scroll(function(e) {
        
        if($(this).scrollTop() >= h)  {
        
            header.css({
                position: 'fixed',
                top: 0,
                transition: 'width 0.5s',
                width: '11.8em',                     
            });}
            else{
                header.css({
                    position: 'absolute',
                    top: h,
                    transition: 'width 0.5s',
                    width: '11.5em',           
                    
                });
            }
        
    });

    var w = $("#nmenu ul li a").width();
    $("#nmenu ul li a").css({width: w});
    $("#nmenu ul li a").mouseover(function() {   

        $(this).css({
            transition: 'width 0.3s',
            width: w+20
        })
    })
    .mouseout(function(){
        $(this).css({
            transition: 'width 0.3s',
            width: w
        })   
    })
    });