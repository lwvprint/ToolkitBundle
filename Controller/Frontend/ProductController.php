<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function indexAction($slug)
    {
        $product = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->findOneBy(array('slug' => $slug));
        
        /*
         * Initiate and insert a breadcrumb
		 */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("categories"));
        $breadcrumbs->addItem($product->getCategory()->getName(), $this->get("router")->generate("category", array('slug' => $product->getCategory()->getSlug())));
        $breadcrumbs->addItem($product->getName(), $this->get("router")->generate("product", array('slug' => $slug)));
        
        return $this->render('LWVToolkitBundle:Frontend\Product:product.html.twig', array('product' => $product));
    }
}