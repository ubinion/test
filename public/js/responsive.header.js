/*$('.navbar-toggle').click(function(){
	//$('.navbar-toggle').
	$('.search-bar').slideToggle();
	}
);*/

//Header user account
$('ul.dropdown-menu.user-dropdown-menu').on('click', function(event){
    event.stopPropagation();
});

//responsive search bar
$(function() {
    var d_header = $("#desktop-header");
    var m_search_bar = $("#m-search-bar");
    
    if($(window).width()<=767){ 
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
            	d_header.removeClass("visible").addClass('hidden');
                m_search_bar.addClass('navbar-fixed-top').css({"background-color":"#1a202c", "margin":"0"});
               // $('.search-bar').addClass('.navbar-fixed-top');
            } else {
                d_header.removeClass('hidden').addClass("visible");
                m_search_bar.removeClass('navbar-fixed-top').css({"background-color":"#fff", "margin":"8px -15px"});

            }
        });
    }
});

