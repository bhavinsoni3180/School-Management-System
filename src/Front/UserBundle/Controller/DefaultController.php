<?php

namespace Front\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontUserBundle:Default:dashboard.html.twig');
    }
}
