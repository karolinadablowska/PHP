<?php

	declare(strict_types=1);

	namespace App\Model;

	class EventModel {

	    public function nameValidate($eventName) {

	    	if (is_string($eventName) && (strlen($eventName) <= 255) && !empty($eventName)) {

	    		return true;

	    	} else {

	    		return false;
	    	}
	    }

	    public function descriptionValidate($eventDescription) {

	    	if (empty($eventDescription)) {

	    		return true;

	    	} else {

	    		if (is_string($eventDescription) && (strlen($eventDescription) <= 255)) {

		    		return true;

		    	} else {

		    		return false;
		    	}
	    	}
	    }

	    public function startDateValidate($eventStartDate) {

	    	if (empty($eventStartDate)) {

	    		return false;

	    	} else {

	    		return true;
	    	}
	    }

	    public function endDateValidate($eventEndDate) {

	    	if (empty($eventEndDate)) {

	    		return false;

	    	} else {

	    		return true;
	    	}
	    }

	}