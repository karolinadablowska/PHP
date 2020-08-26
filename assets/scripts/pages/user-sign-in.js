require("../../styles/pages/_user-sign-in.scss");

/* setTimeout(

	function(){*/
		
		var dd = JSON.stringify({"username": "kdablowska", "password": "123"})
		
		$.ajax(

			{
				method  : 'POST',
				url     : 'http://calendar.dablowska.local/signin',
				dataType: 'json',
				contentType: "application/json",
				data    : dd,

				success: function(response_) {
					
					// console.log(response_);
					window.location.href = response_.path;
				},
				
				error: function(error_, status_, eer_) {
					
					console.log(error_);
				},
			}
		);
		
	/*}, 5000
);*/
