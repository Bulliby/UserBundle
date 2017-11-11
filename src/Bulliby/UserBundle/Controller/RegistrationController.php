<?php

namespace Bulliby\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Bulliby\UserBundle\Model\UserManager;
use Bulliby\UserBundle\Form\UserType;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request, UserManager $userManager)
    {
		$user = $userManager->createUser();
		$form = $this->createForm(UserType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid())
		{
			$userManager->saveUser($user);	
			return $this->redirect($this->generateUrl('homepage'));
		}
		return $this->render('BullibyUserBundle:Registration:register.html.twig', [ 
			'form' => $form->createView()
			]);
	}
}
