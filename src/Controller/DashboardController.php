<?php

	namespace App\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

	use App\Entity\EventEntity as EventEntity;

	/*use Symfony\Component\HttpFoundation\{

		Request      as Request,
		JsonResponse as JsonResponse,
		Response     as Response
	};*/

	/**
     * Dashboard controller.
     */
	class DashboardController extends AbstractController {

	    public function indexAction() {

		    $repository = $this->getDoctrine()->getRepository(EventEntity::class);

		    $eventsPerPage = $repository->findEventsPerPage();

		    $pageNumber = ceil(count($repository->findAll()) / 2);

		    if ($pageNumber == 0) {

		    	$pageNumber = 1;
		    }

		    return $this->render('@pages/dashboard.html.twig', ["events_per_page" => $eventsPerPage, "page_number" => $pageNumber]);
	    }

	}