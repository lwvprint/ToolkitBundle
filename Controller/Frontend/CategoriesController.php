<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller
{

    public function indexAction()
    {

        //if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {

            if($this->get('security.context')->isGranted('ROLE_LWV')) {
                return $this->redirect($this->generateUrl('staff_dashboard'));
            }
            
            $user = $this->get('security.context')->getToken()->getUser();

            $categories = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Frontend\Category')
                    ->findBy(array('company' => $user->getCompany()->getId()), array('name' => 'ASC'));

            $products = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Frontend\Product')
                    ->getActiveProductsWithImages();

            /*
             * Initiate and insert a breadcrumb
            */
            $breadcrumbs = $this->get("white_october_breadcrumbs");
            $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
            $breadcrumbs->addItem("Categories", $this->get("router")->generate("categories"));

            return $this->render('LWVToolkitBundle:Frontend\Home:index.html.twig', array('categories' => $categories, 'products' => $products));

        //} else {

            //return $this->redirect($this->generateUrl('login'));

        //}
    }
    
    public function categoryAction($slug)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $category = $this->getDoctrine()->getEntityManager()
                ->getRepository('LWVToolkitBundle:Frontend\Category')
                ->findOneBy(array('slug' => $slug, 'company' => $user->getCompany()->getId()));

        if (!$category) {
            throw $this->createNotFoundException('No category found for '.$slug);
        }

        $products = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Frontend\Product')
                ->findBy(array('category' => $category->getId(), 'visible' => '1'));

        /*
        * Initiate and insert a breadcrumb
		*/
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("categories"));
        $breadcrumbs->addItem($category->getName(), $this->get("router")->generate("category", array('slug' => $slug)));

        return $this->render('LWVToolkitBundle:Frontend\Category:category.html.twig', array('category' => $category, 'products' => $products));
    }

}
