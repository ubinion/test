function openPYM(modalOrigin){
	var id = modalOrigin.getAttribute('data-id');
	var subName = modalOrigin.getAttribute('data-subName');
	var url= "php/search-paper.php?id=";

	$('#PastYearModal .modal-title').text(subName);
	$('#PastYearModal .modal-body').html('<p class="text-info">Loading...</p>');
	$('#PastYearModal .modal-body').load(url+id);
};

$(document).ready(function() {
	/*$(function () {
	  $('.PastYear_info').tooltip();
	});*/
		
	//trigger the event when the search form submitted
	$( "#search-paper-form" ).submit(function( event ) {
		event.preventDefault();
		
		//get value from input
		var kw = $("input[name='keyword']").val().toUpperCase();
		
		//replace special characterSet
		kw=kw.replace(/[^a-z0-9\'\s]/gi, " ");
		
		//process to ajax 
		$.ajax({
			url: "php/search-subject.php",
			type: "POST",
			data:{ kw:kw},
			dataType : 'html',
			beforeSend: function() {
				$("#paper-result-area").html('<div class="text-center"><div class="loading-mid"></div></div>');
				//_gaq.push(['_trackEvent', 'Search', 'Subject',kw]);
			},
			success: function(data, textStatus, xhr) {
					//display the result found
					$("#paper-result-area").html(data);
					//_gaq.push(['_trackEvent', 'Search', 'Success']);
					
			},
			error: function(xhr, textStatus, errorThrown) {
				//throw error message
				$("#paper-result-area").css('color','red');
				$("#paper-result-area").text("Error thrown in ajax : status = "+textStatus + " " + errorThrown);
				//_gaq.push(['_trackEvent', 'Search', 'Fail',errorThrown]);
			}
		});
	});

});