<?php

	declare(strict_types=1);

	namespace App\Controller\User;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Security\Http\Authentication\AuthenticationUtils as AuthenticationUtils;

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

	    public function logOnAction(Request $request_, AuthenticationUtils $authenticationUtils_) {

			// response data
			$response = [];
		
			// checking if request is via AJAX
			switch($request_->isXmlHttpRequest()) {

				case true:

					// TOKEN CSRF

					// $this->redirectToRoute('users.user.loggedIn');

					$error = $authenticationUtils_->getLastAuthenticationError();

					if (!is_null($error) && count($error)) {

						/*return new JsonResponse(

							array("path2" => $this->generateUrl('users.user.loggedIn'))
						);*/
						
						// response data
						$response = [
						
							"status" => "ERROR_VALIDATION",
							"errors" => [
							
								"message" => "Bledy walidacji"
							]
						];
						
					} else {
						
						// response data
						$response = [
						
							"status" => "SUCCESS",
							"links"  => [
							
								"dashboard" => $this->generateUrl("dashboard")
							]
						];
					}
					
					// response data
					/*$response = [
					
						"status" => "SUCCESS",
						"links"  => [
						
							"dashboard" => $this->generateUrl("dashboard")
						]
					];*/

					break;

				case false:

					$response = [
					
						"status" => "ERROR_REQUEST",
						"errors" => [
							
							"message" => "Nieprawidłowe żądanie"
						]
					];
					
					break;
			}
				
			// return response as JSON
			return new JsonResponse($response);
	    }

		public function logOffAction() {

	    	
	    }
	}