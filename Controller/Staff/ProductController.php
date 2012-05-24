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
    
    public function showAction($id, $slug, $category)
    {
        $product = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Product.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('LWVToolkitBundle:Staff/Product:show.html.twig', array(
            'product' => $product,
            'slug' => $slug,
            'category' => $category,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function newAction($slug, $category)
    {
        $toolkit = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Toolkit\Toolkit')
                ->findOneBy(array('slug' => $slug));
                
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
        
        $form = $this->createForm(new ProductType(), $product, array('toolkitId' => $toolkit->getId()));

        return $this->render('LWVToolkitBundle:Staff/Product:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
            'slug' => $slug,
            'category' => $category
        ));
    }
    
    public function createAction($slug, $category)
    {
        $toolkit = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Toolkit\Toolkit')
                ->findOneBy(array('slug' => $slug));
        
        $product = new Product();
        
        $request = $this->getRequest();
        
        $form = $this->createForm(new ProductType(), $product, array('toolkitId' => $toolkit->getId()));
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($product);
                $em->flush();
                
                return $this->redirect($this->generateUrl('staff_product_show', array('id' => $product->getId(), 'slug' => $slug, 'category' => $category)));
            }
        }
        
        return $this->render('LWVToolkitBundle:Staff/Product:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
            'slug' => $slug,
            'category' => $category
        ));
    }
    
    public function editAction($id, $slug, $category)
    {
        $toolkit = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Toolkit\Toolkit')
                ->findOneBy(array('slug' => $slug));

        $product = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Product.');
        }

        $editForm = $this->createForm(new ProductType(), $product, array('toolkitId' => $toolkit->getId()));
        
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LWVToolkitBundle:Staff/Product:edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'slug' => $slug,
            'category' => $category
        ));
    }
    
    public function updateAction($id, $slug, $category)
    {
        $product = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Product.');
        }

        $editForm = $this->createForm(new ProductType(), $product);
        
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($product);
            $em->flush();

            return $this->redirect($this->generateUrl('staff_product_edit', array('id' => $id, 'slug' => $slug, 'category' => $category)));
        }

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function deleteAction($slug, $category, $id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LWVToolkitBundle:Product\Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product Category.');
            }

            $entity->setDeletedAt(new \DateTime());
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('staff_product_category'));
    }
    
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}