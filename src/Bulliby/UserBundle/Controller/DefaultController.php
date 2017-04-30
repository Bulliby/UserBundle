<?php

namespace Bulliby\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BullibyUserBundle:Default:index.html.twig');
    }
}
