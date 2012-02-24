<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use LWV\UserBundle\Entity\Profile;
//use LWV\UserBundle\Form\Type\UserType;

class DashboardController extends Controller
{

    public function indexAction()
    {
        // Redirect User to Staff Dashboard, if they are LWV Staff
        if ($this->get('security.context')->isGranted('ROLE_LWV')) {
            return $this->redirect($this->generateUrl('staff_dashboard'));
        }

        return $this->render('LWVToolkitBundle:Frontend\Dashboard:index.html.twig');
    }

}