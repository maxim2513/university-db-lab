<?php

namespace DB\FactoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DBFactoryBundle:Default:home.html.twig');
    }
    public function createAction()
    {
        return $this->render('DBFactoryBundle:Default:create.html.twig');
    }
    public function listAction()
    {
        return $this->render('DBFactoryBundle:Default:list.html.twig');
    }
}
