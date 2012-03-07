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


            $this->get('session')->getFlashBag()->set('WARNING', 'WARNING! WARNING! WARNING!');
            $this->get('session')->set('error', 'ERROR! ERROR! ERROR!');
            $this->get('session')->set('success', 'SUCCESS! SUCCESS! SUCCESS!');
            $this->get('session')->set('info', 'INFO! INFO! INFO!');


            return $this->render('LWVToolkitBundle:Frontend\Home:index.html.twig', array('categories' => $categories, 'products' => $products));

        } else {

            return $this->redirect($this->generateUrl('login'));
        }
    }


    public function categoryAction($slug)
    {
        $category = $this->getDoctrine()->getEntityManager()
                ->getRepository('LWVToolkitBundle:Frontend\Category')
                ->findOneBySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('No category found for '.$slug);
        }

        $products = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Frontend\Product')
                ->findBy(array('category' => $category->getId(), 'visible' => '1'));

        /*if (!$products) {
            throw $this->createNotFoundException('No products found.');
        }*/

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
