<?php

namespace LWV\Toolkit\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            
            if($this->get('security.context')->isGranted('ROLE_LWV')) {
                return $this->redirect($this->generateUrl('staff_dashboard'));
            }
            
            $categories = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitShopBundle:Category')
                    ->getAllCategoriesBySegment();
            
            $products = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitShopBundle:Product')
                    ->getAllProductsWithImages();
            
            $this->get('session')->setFlash('warning', 'WARNING! WARNING! WARNING!');
            $this->get('session')->setFlash('error', 'ERROR! ERROR! ERROR!');
            $this->get('session')->setFlash('success', 'SUCCESS! SUCCESS! SUCCESS!');
            $this->get('session')->setFlash('info', 'INFO! INFO! INFO!');
         
            return $this->render('LWVToolkitShopBundle:Default:index.html.twig', array('categories' => $categories, 'products' => $products));
            
        } else {
        
            return $this->redirect($this->generateUrl('login'));
            ;
        }
    }
    
}
