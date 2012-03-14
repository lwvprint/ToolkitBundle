<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller
{

    public function indexAction()
    {
        if($this->get('security.context')->isGranted('ROLE_LWV')) {
            return $this->redirect($this->generateUrl('staff_dashboard'));
        }

        $user = $this->get('security.context')->getToken()->getUser();
        $company = $user->getCompany();
        $toolkit = $company->getToolkit();

        $categories = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Category\Category')
                ->findBy(array('toolkit' => $toolkit->getId()), array('name' => 'ASC'));

        $products = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->getActiveProductsWithImages();

        /*
         * Initiate and insert a breadcrumb
         */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("categories"));

        return $this->render('LWVToolkitBundle:Frontend\Category:categories.html.twig', array('categories' => $categories, 'products' => $products));
    }
    
    public function categoryAction($slug)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $company = $user->getCompany();
        $toolkit = $company->getToolkit();
        
        $category = $this->getDoctrine()->getEntityManager()
                ->getRepository('LWVToolkitBundle:Category\Category')
                ->findOneBy(array('slug' => $slug, 'toolkit' => $toolkit->getId()));

        if (!$category) {
            throw $this->createNotFoundException('No category found for '.$slug);
        }

        $products = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
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
