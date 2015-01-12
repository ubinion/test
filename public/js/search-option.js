$(".dropdown-menu li a").click(function(){
	var selText = $(this).text();
	$(this).parents('.input-group').find('.dropdown-toggle').html(selText+' <span class="caret caret-space"></span>');
	});