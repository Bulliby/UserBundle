<?php

namespace FamillyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use FamillyBundle\Form\UserType;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
		$user = $this->get('bulliby.user_manager')->createUser();
		$form = $this->createForm(UserType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid())
		{
			$this->get('bulliby.user_manager')->saveUser($user);	
			return $this->redirect($this->generateUrl('index'));
		}
		return $this->render('FamillyBundle:Registration:register.html.twig', [ 
			'form' => $form->createView()
			]);
	}
}
