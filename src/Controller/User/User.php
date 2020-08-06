<?php

	declare(strict_types=1);

	namespace App\Controller\User;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

	/*use Symfony\Component\HttpFoundation\{

		Request      as Request,
		JsonResponse as JsonResponse,
		Response     as Response
	};*/

	/**
     * User controller.
     *
     * @author Karolina Dąblowska
     */
	class User extends AbstractController {

		/**
         * Index action.
         *
         * @return Response Rendered template.
         */
	    public function indexAction() {

		    return $this->render('@pages/user_sign_in.html.twig');
	    }

	}