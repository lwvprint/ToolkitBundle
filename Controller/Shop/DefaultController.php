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
            
            $products = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitShopBundle:Product')
                    ->getAllProductsWithImages();
            
            return $this->render('LWVToolkitShopBundle:Default:index.html.twig', array('products' => $products));
            
        } else {
        
            return $this->redirect($this->generateUrl('login'));
            
        }
    }
    
}
