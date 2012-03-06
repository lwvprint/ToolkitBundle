<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller
{

    public function indexAction()
    {

        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {

            if($this->get('security.context')->isGranted('ROLE_LWV')) {
                return $this->redirect($this->generateUrl('staff_dashboard'));
            }
            $user = $this->get('security.context')->getToken()->getUser();

            $categories = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Frontend\Category')
                    ->findBy(array('company' => $user->getCompany()->getId()));

            $products = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Frontend\Product')
                    ->getActiveProductsWithImages();

            /*
            $this->get('session')->setFlash('warning', 'WARNING! WARNING! WARNING!');
            $this->get('session')->setFlash('error', 'ERROR! ERROR! ERROR!');
            $this->get('session')->setFlash('success', 'SUCCESS! SUCCESS! SUCCESS!');
            $this->get('session')->setFlash('info', 'INFO! INFO! INFO!');
            */

            /*
             * Initiate and insert a breadcrumb
            */
            $breadcrumbs = $this->get("white_october_breadcrumbs");
            $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
            $breadcrumbs->addItem("Categories", $this->get("router")->generate("categories"));

            return $this->render('LWVToolkitBundle:Frontend\Home:index.html.twig', array('categories' => $categories, 'products' => $products));

        } else {

            return $this->redirect($this->generateUrl('login'));

        }
    }

}
