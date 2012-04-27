<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LWV\ToolkitBundle\Entity\Product\Product;
use LWV\ToolkitBundle\Form\Product\ProductType;

class ProductController extends Controller
{
    public function indexAction($slug, $category)
    {
        $toolkit = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Toolkit\Toolkit')
                ->findOneBy(array('slug' => $slug));
        
        $productCategory = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\ProductCategory')
                ->findOneBy(array('toolkit' => $toolkit->getId(), 'slug' => $category));
        
        $products = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->findBy(array('category' => $productCategory->getId()));
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Toolkit List", $this->get("router")->generate("staff_toolkit"));
        $breadcrumbs->addItem($toolkit->getName(), $this->get("router")->generate("staff_toolkit"));
        $breadcrumbs->addItem($productCategory->getName(), $this->get("router")->generate("staff_product_category", array('slug' => $slug)));
        $breadcrumbs->addItem("Product List", null);
        
        return $this->render('LWVToolkitBundle:Staff/Product:product.html.twig', array(
            'products' => $products,
            'slug' => $slug,
            'category' => $category
        ));
    }
    
    public function showAction($category, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $product = $em->getRepository('LWVToolkitBundle:Product\Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Product.');
        }

        //$deleteForm = $this->createDeleteForm($id);
        
        return $this->render('LWVToolkitBundle:Staff/Product:show.html.twig', array(
            'product' => $product,
            'category' => $category
            //'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function newAction($slug, $category)
    {
        $product = new Product();
        
        if($category != 'default'){
            $em = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Product\ProductCategory')
                    ->findOneBy(array('slug' => $category));

            $product->setCategory($em);
        }

        $dateFrom = date('Y-m-d H:i', strtotime('-1 hour', time()));
        $dateTill = date('Y-m-d H:i', strtotime('-1 hour +1 month', time()));
        
        $product->setActiveFrom(new \DateTime($dateFrom));
        $product->setActiveTill(new \DateTime($dateTill));
        
        $form = $this->createForm(new ProductType(), $product);

        return $this->render('LWVToolkitBundle:Staff/Product:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
            'slug' => $slug,
            'category' => $category
        ));
    }
    
    public function createAction()
    {
        $product = new Product();
        
        $request = $this->getRequest();
        
        $form = $this->createForm(new ProductType(), $product);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($product);
                $em->flush();
                
                return $this->redirect($this->generateUrl('staff_product_show', array('id' => $product->getId())));
            }
        }
        
        return $this->render('LWVToolkitBundle:Staff/Product:new.html.twig', array(
            'product' => $product,
            'form'   => $form->createView(),
        ));
    }
    
    public function editAction()
    {
        
    }
    
    public function updateAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
    
    public function createDeleteForm()
    {
        
    }
}