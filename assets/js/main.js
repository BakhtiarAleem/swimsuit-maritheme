

$(window).on('load',function(){
    // Animate loader off screen
    setTimeout(function(){ // allowing 3 secs to fade out loader
        $('.page-loader').hide();   
    },3500);
});

$( document ).ready(function() {


    function menuFunc() {
        $(".main-header .menu-main-menu-container .nav li:nth-child(2)").after($(".main-header .logo-container"));
    }

    function search(){
        $('header.mobile-menu .search-icon').click(function(){
            $('header.mobile-menu .search-column').toggle();
        });
    }

    function menuItem(){
        $('header.mobile-menu .menu-icon').click(function(){
            $('header.mobile-menu .navigation-column').toggle();
        });
    }
    if ($(window).width() > 786) {
        menuFunc();        
    }
    if ($(window).width() < 787) {
        search();
        menuItem();
    }

    
});