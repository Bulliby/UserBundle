<?php

namespace FamillyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Bulliby\UserBundle\Form\LoginType;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
		$form = $this->createForm(LoginType::class);
		$form->handleRequest($request);

		$request->getSession()->getFlashBag()->add(
			'warning',
			'You can\'t login with this username and password'
		);

		if ($form->isSubmitted() && $form->isValid())
		{
			$user = $this->get('bulliby.user_manager')->loadUser([
				'username' => $form->getData()['login']
			]);
			if (isset($user) && $this->get('bulliby.password')->verifyPassword(
				$form->getData()['password'], $user->getPassword()
			))
				return $this->redirect($this->generateUrl('index'));
			else
				return $this->redirect($this->generateUrl('login'));
				
		}

		return $this->render('BullibyUserBundle:Login:login.html.twig', [ 
			'form' => $form->createView()
			]);
	}
}
