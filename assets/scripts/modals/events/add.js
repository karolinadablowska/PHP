require("../../../styles/utils/components/modals/events/_add.scss");

export default class {
	
	// konstruktor klasy
	constructor() {
		
		this.onClickOverlay();
		
	}
	
	onClickOverlay() {
		
		$(".modal-add-event-overlay").click(function() {
			
			// główny kontener okna modalnego
			var modal = $(this).closest(".modal-add-event");
			
			// ukrycie okna modalnego
			modal.removeClass("modal-add-event-toggle")
		});
	}
	
}