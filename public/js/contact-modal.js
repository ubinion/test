$(document).ready(function() {
	//validate the login form by plugin
	$('#contact-form').bootstrapValidator({
		container: '.contact-form-status',
		submitButtons: 'button[type="submit"]',
		live:'disabled',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
		cf_email: {
				validators: {
					notEmpty: {
						// enabled is true, by default
						message: 'Ubinion, please enter your email address.'
					},
					emailAddress:{
						
						message: 'Ubinion, this is not an email. Enter valid email type.'
					}
				}
			},
		cf_subject: {
				validators: {
					notEmpty: {
						// enabled is true, by default
						message: 'Ubinion, you missed the subject.'
					}
				}
			},
			cf_message:{
				validators: {
					notEmpty: {
						// enabled is true, by default
						message: 'Ubinion, tell me more please.'
					}
				}
			}
		}
		
	})
	.on('success.form.bv', function(e) {
		//function to submit the ajax form
		
		// Prevent submit form
		e.preventDefault();

		//get value from both input
		var cf_email=$( "input[name='cf_email']" ).val();
		var cf_subject=$( "input[name='cf_subject']" ).val();
		var cf_message=$( "textarea[name='cf_message']" ).val();

		
		//process to ajax to login a user
		$.ajax({
			url: "php/contact.php",
			type: "POST",
			data:{ cf_email:cf_email, cf_subject:cf_subject, cf_message:cf_message },
			beforeSend: function() {
				$('#ContactModal .modal-dialog .modal-footer').html('<div class="text-right"><div class="loading-small" style="margin-right:0"></div></div>');

			},
			success: function(data, textStatus, xhr) {
					
					$('#ContactModal .modal-dialog .modal-footer').html(data);
								
			},
			error: function(xhr, textStatus, errorThrown) {
				$('#ContactModal .modal-dialog .modal-footer').css('color','red');
				$('#ContactModal .modal-dialog .modal-footer').text("Error thrown in ajax : "+textStatus + " " + errorThrown);
			}
		});
	});

});