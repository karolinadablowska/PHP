require("../../styles/pages/_user-sign-in.scss");

// bind event for send button of form
$("#send").click(function() {
		
	// alias to error node
	var errorNode = $(".user-sign-in-form-error");
		
	// username or email, password
	const username = $("#username").val(),
	      password = $("#password").val();
		
	// encode data for send to server (diactric marks)
	var data = JSON.stringify({"username": username, "password": password});
		
		// Niepoprawne dane logowania
		
	// send data to server (via AJAX)
	$.ajax(

		{
			method  : 'POST',
			url     : '/signin',
			contentType: "application/json",
			dataType: 'json',
			data: data,

			// execute if request is OK
			success: function(response_) {
				
				switch(response_.status) {
					
					case "SUCCESS":
					
						window.location.href = response_.links.dashboard;
					
						break;
						
					case "ERROR_VALIDATION":
					
						errorNode.text(response_.errors.message);
					
						break;
						
					case "ERROR_REQUEST":
					
						errorNode.text(response_.errors.message);
					
						break;
				}
			},
			
			// execute if request is not OK
			error: function(error_) {
				
				console.log(error_);
				
				errorNode.text("Wystąpił nieoczekiwany problem");
			},
		}
	);
});

		
		
