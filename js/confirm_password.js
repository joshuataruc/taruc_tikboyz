$('#submit-btn').attr('disabled', true);
$('#password, #con-password').on('keyup', function(){
	if ($('#con-password').val() == $('#password').val()) {
		$('#pass-message').html('Password Match').css('color', '#007bff ');
		$('#submit-btn').attr('disabled', false);
	}
	else{
		$('#pass-message').html('Password did not Match').css('color', '#dc3545  ');
		$('#submit-btn').attr('disabled', true);

	}
});

// $('#password, #con-password').on('keyup', function () {
//   if ($('#password').val() == $('#con-password').val()) {
//     $('#pass-message').html('Matching').css('color', 'green');
//   } else 
//     $('#pass-message').html('Not Matching').css('color', 'red');
// });