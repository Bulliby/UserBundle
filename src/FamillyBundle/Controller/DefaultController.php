<?php

namespace FamillyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
		$user = $this->get('bulliby.user_manager')->createUser();
        return $this->render('FamillyBundle:Default:index.html.twig');
    }
}
