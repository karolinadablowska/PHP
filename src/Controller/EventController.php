<?php

	declare(strict_types=1);

	namespace App\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

	use App\Model\EventModel   as EventModel;
	use App\Entity\EventEntity as EventEntity;

	use Symfony\Component\HttpFoundation\{

		Request      as Request,
		JsonResponse as JsonResponse,
		Response     as Response
	};

	class EventController extends AbstractController {

	    public function createEventAction(Request $request) {

	    	// models
	    	$model = new EventModel();

	    	// data
		    $rawData = json_decode($request->getContent(), true);

		    $eventName        = $rawData["eventName"];
		    $eventDescription = $rawData["eventDescription"];
		    $eventStartDate   = $rawData["eventStartDate"];
		    $eventEndDate     = $rawData["eventEndDate"];

		    // validation
			$isEventNameValidated        = $model->nameValidate($eventName);
			$isEventDescriptionValidated = $model->descriptionValidate($eventDescription);
			$isEventStartDateValidated   = $model->startDateValidate($eventStartDate);
			$isEventEndDateValidated     = $model->endDateValidate($eventEndDate);

			if ($isEventNameValidated && $isEventDescriptionValidated && $isEventStartDateValidated && $isEventEndDateValidated) {

				// event entity with set data
				$eventEntity = new EventEntity();

				$eventEntity->setTitle($eventName);
				$eventEntity->setDescription($eventDescription);
				$eventEntity->setDateFrom($eventStartDate);
				$eventEntity->setDateTo($eventEndDate);

				// respository
			    $repository = $this->getDoctrine()->getRepository(EventEntity::class);

			    // save data into database
			    $repository->createEvent($eventEntity);

			    return new JsonResponse([

			    	"status"  => "SUCCESS",
			    	"message" => "Wydarzenie dodane"
			    ]);

			} else {

				return new JsonResponse([

			    	"status" => "ERROR_VALIDATION",
					"errors" => [
					
						"message" => "Bledy walidacji"
					]
			    ]);
			}
	    }

	    public function editEventAction(Request $request) {

	    	// models
	    	$model = new EventModel();

			// data
		    $rawData = json_decode($request->getContent(), true);

		    $eventId          = $rawData["eventId"];
		    $eventName        = $rawData["eventName"];
		    $eventDescription = $rawData["eventDescription"];
		    $eventStartDate   = $rawData["eventStartDate"];
		    $eventEndDate     = $rawData["eventEndDate"];

		    // validation
			$isEventNameValidated        = $model->nameValidate($eventName);
			$isEventDescriptionValidated = $model->descriptionValidate($eventDescription);
			$isEventStartDateValidated   = $model->startDateValidate($eventStartDate);
			$isEventEndDateValidated     = $model->endDateValidate($eventEndDate);

			if ($isEventNameValidated && $isEventDescriptionValidated && $isEventStartDateValidated && $isEventEndDateValidated) {

			    $repository = $this->getDoctrine()->getRepository(EventEntity::class);

			    $repository->updateEvent($eventId, $eventName, $eventDescription, $eventStartDate, $eventEndDate);

			    return new JsonResponse([

			    	"status"  => "SUCCESS",
			    	"links"  => [
							
						"dashboard" => $this->generateUrl("dashboard")
					]
			    ]);

			} else {

				return new JsonResponse([

			    	"status" => "ERROR_VALIDATION",
					"errors" => [
					
						"message" => "Bledy walidacji"
					]
			    ]);
			}
	    }

		public function removeEventAction($eventId) {

	    	$repository = $this->getDoctrine()->getRepository(EventEntity::class);

		    $repository->removeEvent($eventId);

		    return new JsonResponse([

		    	"status"  => "SUCCESS",
		    	"links"  => [
						
					"dashboard" => $this->generateUrl("dashboard")
				]
		    ]);
	    }

	    public function singleEventAction($eventId) {

	    	$repository = $this->getDoctrine()->getRepository(EventEntity::class);

		    $event = $repository->findEvent($eventId);

			return new JsonResponse([

				"data" => [

					"id"          => $event->getId(),
					"name"        => $event->getTitle(),
					"description" => $event->getDescription(),
					"startDate"   => $event->getDateFrom(),
					"endDate"     => $event->getDateTo()
				]
			]);	
	    }

	    public function eventListAction(Request $request) {

	    	$page = $request->get("page");

	    	$repository = $this->getDoctrine()->getRepository(EventEntity::class);

		    $eventsPerPage = $repository->findEventsPerPage($page);

		    $renderdRows = $this->renderView('@pages/parts/single-event-row.html.twig', ["events_per_page" => $eventsPerPage]);

			return new JsonResponse(["content" => $renderdRows]);	    	
	    }
	}