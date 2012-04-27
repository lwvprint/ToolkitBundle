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
                ->getRepository('LWVToolkitBundle:Product\ProductCategory')
                ->findBy(array('parent' => null, 'toolkit' => $toolkit), array('name' => 'ASC'));

        $products = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->getActiveProductsWithImages();

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->container->get("router")->generate("shop"));

        return $this->render('LWVToolkitBundle:Frontend\Home:home.html.twig', array('categories' => $categories, 'products' => $products));
    }
}