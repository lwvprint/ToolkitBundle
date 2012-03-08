<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaffController extends Controller
{
    public function indexAction()
    {
        /*
         * Initiate and insert a breadcrumb
        */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));

        $this->get('session')->getFlashBag()->set('notice', 'NOTICING');

        return $this->render('LWVToolkitBundle:Staff:staff.html.twig');
    }
}
