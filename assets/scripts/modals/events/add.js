require("../../../styles/utils/components/modals/events/_add.scss");
require("../../../styles/utils/components/inputs/_input.scss");
require("../../../styles/utils/components/textareas/_textarea.scss");

export default class {
	
	// konstruktor klasy
	constructor() {
		
		this.onCreateEvent();
		this.onClickOverlay();
		
	}
	
	toggleModal() {
		
		$(".modal-add-event").toggleClass("modal-add-event-toggle");
	}
	
	onClickOverlay() {
		
		$(".modal-add-event-overlay").click(function() {
			
			// główny kontener okna modalnego
			var modal = $(this).closest(".modal-add-event");
			
			// ukrycie okna modalnego
			modal.removeClass("modal-add-event-toggle")
		});
	}
	
	onCreateEvent() {
		
		$(".button-add-event-create").click(function() {
			
			console.log("tworzenie wydarzenia");
			
			// główny kontener okna modalnego
			// var modal = $(this).closest(".modal-add-event");
			
			// ukrycie okna modalnego
			// modal.removeClass("modal-add-event-toggle")
		});
	}
	
}