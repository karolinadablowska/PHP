<?php

	namespace App\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

		    return $this->render('@pages/dashboard.html.twig');
	    }

	}