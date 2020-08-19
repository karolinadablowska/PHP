require("../../styles/pages/_user-sign-in.scss");

setTimeout(

	function(){
		
		$.ajax(

			{
				method  : 'POST',
				url     : 'http://calendar.dablowska.local/signin',
				dataType: 'json',
				data    : {

					data: {
						
						username: "kdablowska",
						password: "123"
					}
				},

				success: function(response_) {
					
					console.log(response_);
				},
				
				error: function(error_, status_, eer_) {
					
					console.log(error_);
				},
			}
		);
		
	}, 5000
);
