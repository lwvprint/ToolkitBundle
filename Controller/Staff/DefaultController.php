<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{

    public function indexAction($name = 'test')
    {

        /*
         * Initiate and insert a breadcrumb
        */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));

        return $this->render('LWVToolkitBundle:Staff:index.html.twig', array('name' => $name));
    }
}
