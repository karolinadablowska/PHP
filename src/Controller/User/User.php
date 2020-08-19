<?php

	declare(strict_types=1);

	namespace App\Controller\User;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

	use Symfony\Component\HttpFoundation\{

		Request      as Request,
		JsonResponse as JsonResponse,
		Response     as Response
	};

	/**
     * User controller.
     */
	class User extends AbstractController {

	    public function indexAction() {

		    return $this->render('@pages/user_sign_in.html.twig');
	    }

	    public function logOnAction(Request $request_) {

		    	switch($request_->isXmlHttpRequest()) {

		    		case true:

		    			// return $this->render('@pages.childs.users.logIn/page.html.twig');

		    			// TOKEN CSRF

		    			// $this->redirectToRoute('users.user.loggedIn');

		    			return new JsonResponse(

		    				array("path" => $this->generateUrl('dashboard'))
	    				);

		    			break;

	    			case false:

						;

		    			break;
		    	}
	    }

		public function logOffAction() {

	    	;
	    }
	}