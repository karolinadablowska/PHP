require("../../styles/pages/_dashboard.scss");

import ModalAddEvent from "../modals/events/add.js";

class DashboardPage {
	
	constructor() {
		
		this.modals = {
			
			"events": {
				
				"add": new ModalAddEvent()
			}
		};
		
		// events
		this.onAddEvent();
	}
	
	onAddEvent() {
		
		const self = this;
		
		$(".button-add-event").click(function() {
			
			self.modals.events.add.toggleModal();
		});
	}
}

new DashboardPage();