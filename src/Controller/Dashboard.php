<?php

	declare(strict_types=1);

	namespace App\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

	/*use Symfony\Component\HttpFoundation\{

		Request      as Request,
		JsonResponse as JsonResponse,
		Response     as Response
	};*/

	/**
     * Dashboard controller.
     *
     * @author Karolina Dąblowska
     */
	class Dashboard extends AbstractController {

		/**
         * Index action.
         *
         * @return Response Rendered template.
         */
	    public function indexAction() {

		    return $this->render('@pages/dashboard.html.twig');
	    }

	}