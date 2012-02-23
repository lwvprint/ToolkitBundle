<?php

namespace LWV\ToolkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('LWVToolkitBundle:Default:index.html.twig', array('name' => $name));
    }
}
