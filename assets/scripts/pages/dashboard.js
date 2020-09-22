require("../../styles/pages/_dashboard.scss");

import ModalAddEvent from "../modals/events/add.js";
import ModalEditEvent from "../modals/events/edit.js";

class DashboardPage {
	
	constructor() {
		
		this.modals = {
			
			"events": {
				
				"add": new ModalAddEvent(),
				"edit": new ModalEditEvent()
			}
		};
		
		this.eventAdd();
		this.eventEdit();
		this.eventRemove();
		this.eventGetEventsPerPage();
	}
	
	eventGetEventsPerPage() {

		$(".dashboard-events-pagination > span").click(function() {

			const pageNumber = $(this).data("page-number");

			$.ajax(

				{
					method  : 'GET',
					url     : '/event?page=' + pageNumber,
					contentType: "application/json",
					dataType: 'json',
					
					success: function(response_) {

						$(".dashboard-events-list-data").html(response_.content);
					},
					
					error: function(error_) {
						
						console.log(error_);
					},
				}
			);
		});
	}

	eventAdd() {
		
		const self = this;
		
		$(".button-add-event").click(function() {
			
			self.modals.events.add.toggleModal();
		});
	}

	eventEdit() {
		
		const self = this;
		
		$("body").on("click", ".fas.fa-edit", function() {
			
			var eventId = $(this).data("event-id");
	
			$.ajax(

				{
					method  : 'GET',
					url     : '/event/' + eventId,
					contentType: "application/json",
					dataType: 'json',
					
					success: function(response_) {
						
						console.log(response_);

						self.modals.events.edit.setData(response_.data);
						self.modals.events.edit.toggleModal();
					},
					
					error: function(error_) {
						
						console.log(error_);
					},
				}
			);
		});
	}

	eventRemove() {
		
		const self = this;
		
		$("body").on("click", ".fas.fa-trash-alt", function() {
			
			var eventId = $(this).data("event-id");
	
			$.ajax(

				{
					method  : 'DELETE',
					url     : '/event/' + eventId,
					contentType: "application/json",
					dataType: 'json',
					
					success: function(response_) {
						
						console.log(response_);

						window.location.href = response_.links.dashboard;

						// self.modals.events.edit.setData(response_.data);
						// self.modals.events.edit.toggleModal();
					},
					
					error: function(error_) {
						
						console.log(error_);
					},
				}
			);
		});
	}
}

new DashboardPage();