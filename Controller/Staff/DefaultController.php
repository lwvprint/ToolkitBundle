<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{

    public function indexAction($name = 'test')
    {
        return $this->render('LWVToolkitBundle:Staff:index.html.twig', array('name' => $name));
    }
}
