require("../../../styles/utils/components/modals/events/_add.scss");

export default class AddEventModal {
	
	// konstruktor klasy
	constructor() {
		
		this.eventCreateEvent();
		this.eventOverlay();	
	}
	
	toggleModal() {
		
		$(".modal-add-event").toggleClass("modal-add-event-toggle");
	}
	
	eventOverlay() {
		
		$(".modal-add-event-overlay").click(function() {
			
			// główny kontener okna modalnego
			var modal = $(this).closest(".modal-add-event");
			
			// ukrycie okna modalnego
			modal.removeClass("modal-add-event-toggle")
		});
	}
	
	eventCreateEvent() {
		
		// this
		var self = this;

		$(".button-add-event-create").click(function() {

			// alias to error node
			var errorNode = $(".modal-add-event-modal-error");
				
			// hide error node
			errorNode.removeClass("modal-add-event-modal-error-toggle");

			// fields
			var   eventName        = $("#add-event-name"),
			      eventDescription = $("#add-event-description"),
			      eventStartDate   = $("#add-event-start-date"),
			      eventEndDate     = $("#add-event-end-date");
	
			// encode data for send to server
			var data = JSON.stringify({

				"eventName":        eventName.val(),
				"eventDescription": eventDescription.val(),
				"eventStartDate":   eventStartDate.val(),
				"eventEndDate":     eventEndDate.val()
			});
	
			// send data to server (via AJAX)
			$.ajax(

				{
					method  : 'POST',
					url     : '/event',
					contentType: "application/json",
					dataType: 'json',
					data: data,
					success: function(response_) {

						switch(response_.status) {
							
							case "SUCCESS":
							
								self.toggleModal();

								// clear fields
								eventName.val("");
								eventDescription.val("");
								eventStartDate.val("");
								eventEndDate.val("");
							
								break;
								
							case "ERROR_VALIDATION":
							
								errorNode.text(response_.errors.message).addClass("modal-add-event-modal-error-toggle");
							
								break;
						}
					},
					
					error: function(error_) {
						
						errorNode.text("Wystąpił nieoczekiwany problem");
					},
				}
			);
		});
	}
	
}