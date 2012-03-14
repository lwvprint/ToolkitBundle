<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{

    public function indexAction()
    {
        if($this->get('security.context')->isGranted('ROLE_LWV')) {
            return $this->redirect($this->generateUrl('staff_home'));
        }


        $user = $this->get('security.context')->getToken()->getUser();
        $company = $user->getCompany();
        $toolkit = $company->getToolkit();

        $categories = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Category\Category')
                ->findBy(array('toolkit' => $toolkit->getId()));

        $products = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->getActiveProductsWithImages();

        /*
            * Initiate and insert a breadcrumb
            */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));

        return $this->render('LWVToolkitBundle:Frontend\Home:home.html.twig', array('categories' => $categories, 'products' => $products));
    }

    /*if (!$products) {
        throw $this->createNotFoundException('No products found.');
    }*/
}