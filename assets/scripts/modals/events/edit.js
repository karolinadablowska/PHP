require("../../../styles/utils/components/modals/events/_edit.scss");

export default class EditEventModal {
	
	// konstruktor klasy
	constructor() {
		
		this.eventEditEvent();
		this.eventOverlay();	
	}

	setData(data) {

		$("#edit-event-name").val(data.name);
		$("#edit-event-description").val(data.description);
		$("#edit-event-start-date").val(data.startDate);
		$("#edit-event-end-date").val(data.endDate);

		$(".button-edit-event-edit").data("event-id", data.id);
	}

	toggleModal() {
		
		$(".modal-edit-event").toggleClass("modal-edit-event-toggle");
	}
	
	eventOverlay() {
		
		$(".modal-edit-event-overlay").click(function() {
			
			// główny kontener okna modalnego
			var modal = $(this).closest(".modal-edit-event");
			
			// ukrycie okna modalnego
			modal.removeClass("modal-edit-event-toggle")
		});
	}

	eventEditEvent() {
		
		// this
		var self = this;

		$(".button-edit-event-edit").click(function() {

			// alias to error node
			var errorNode = $(".modal-edit-event-modal-error");
				
			// hide error node
			errorNode.removeClass("modal-edit-event-modal-error-toggle");

			// fields
			var   eventId          = $(this).data("event-id"),
				  eventName        = $("#edit-event-name"),
			      eventDescription = $("#edit-event-description"),
			      eventStartDate   = $("#edit-event-start-date"),
			      eventEndDate     = $("#edit-event-end-date");
	
			// encode data for send to server
			var data = JSON.stringify({

				"eventId":          eventId,
				"eventName":        eventName.val(),
				"eventDescription": eventDescription.val(),
				"eventStartDate":   eventStartDate.val(),
				"eventEndDate":     eventEndDate.val()
			});
	
			// send data to server (via AJAX)
			$.ajax(

				{
					method  : 'PUT',
					url     : '/event',
					contentType: "application/json",
					dataType: 'json',
					data: data,
					
					success: function(response_) {
						
						// console.log(response_);

						switch(response_.status) {
							
							case "SUCCESS":
							
								self.toggleModal();

								// clear fields
								eventName.val("");
								eventDescription.val("");
								eventStartDate.val("");
								eventEndDate.val("");
							
								window.location.href = response_.links.dashboard;

								break;
								
							case "ERROR_VALIDATION":
							
								errorNode.text(response_.errors.message).addClass("modal-edit-event-modal-error-toggle");
							
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