<?php

namespace FamillyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Bulliby\UserBundle\Form\LoginType;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
		$form = $this->createForm(LoginType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid())
		{
			return $this->redirect($this->generateUrl('index'));
		}

		return $this->render('BullibyUserBundle:Login:login.html.twig', [ 
			'form' => $form->createView()
			]);
	}
}
