<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{

    public function indexAction()
    {

        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {

            if($this->get('security.context')->isGranted('ROLE_LWV')) {
                return $this->redirect($this->generateUrl('staff_home'));
            }
            /*
             * Initiate and insert a breadcrumb
            */
            $breadcrumbs = $this->get("white_october_breadcrumbs");
            $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));

            $user = $this->get('security.context')->getToken()->getUser();

            $categories = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Frontend\Category')
                    ->findBy(array('company' => $user->getCompany()->getId()));

            $products = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Frontend\Product')
                    ->getActiveProductsWithImages();

            return $this->render('LWVToolkitBundle:Frontend\Home:index.html.twig', array('categories' => $categories, 'products' => $products));

        } else {

            return $this->redirect($this->generateUrl('login'));
        }
    }
    
    /*if (!$products) {
        throw $this->createNotFoundException('No products found.');
    }*/
}