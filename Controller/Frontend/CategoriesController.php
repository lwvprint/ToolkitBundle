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

        $categories = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\ProductCategory')
                ->findBy(array('parent' => null, 'toolkit' => $toolkit->getId()), array('name' => 'ASC'));

        $products = $this->getDoctrine()
                ->getEntityManager()
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
        
        $category = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\ProductCategory')
                ->findOneBy(array('slug' => $slug, 'toolkit' => $toolkit->getId()));

        if (!$category) {
            throw $this->createNotFoundException('No category found for '.$slug);
        }
        
        $subCategories = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\ProductCategory')
                ->findBy(array('parent' => $category->getId()));

        $products = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->findBy(array('category' => $category->getId(), 'is_active' => '1'));

        /*
         * Initiate and insert a breadcrumb
		 */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("categories"));
        $breadcrumbs->addItem($category->getName(), $this->get("router")->generate("category", array('slug' => $slug)));

        return $this->render('LWVToolkitBundle:Frontend\Category:category.html.twig', array(
            'category' => $category,
            'sub_categories' => $subCategories,
            'products' => $products
            ));
    }

}
