<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LWV\ToolkitBundle\Entity\Product\ProductCategory;
use LWV\ToolkitBundle\Form\Product\ProductCategoryType;

/**
 * Product\ProductCategory controller.
 *
 */
class ProductCategoryController extends Controller
{
    /**
     * Lists all Product\ProductCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->findBy(array('lvl' => 0));
        //$entities = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->findAll();

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("staff_product_category"));
        
        return $this->render('LWVToolkitBundle:Staff/ProductCategory:productCategory.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Product\ProductCategory entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("staff_product_category"));
        $breadcrumbs->addItem("". $entity->getName() . "", $this->get("router")->generate("staff_product_category_show", array('id' => $entity->getId())));

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Product\ProductCategory entity.
     *
     */
    public function newAction()
    {
        $entity = new ProductCategory();
        $form   = $this->createForm(new ProductCategoryType(), $entity);
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("staff_product_category"));
        $breadcrumbs->addItem("New Category", null);

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Product\ProductCategory entity.
     *
     */
    public function createAction()
    {
        $entity  = new ProductCategory();
        $request = $this->getRequest();
        $form    = $this->createForm(new ProductCategoryType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('staff_product_category_show', array('id' => $entity->getId())));
        }

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Product\ProductCategory entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product\ProductCategory entity.');
        }

        $editForm = $this->createForm(new ProductCategoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("staff_product_category"));
        $breadcrumbs->addItem("". $entity->getName() . "", $this->get("router")->generate("staff_product_category_show", array('id' => $entity->getId())));
        $breadcrumbs->addItem("Edit", null);

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Product\ProductCategory entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product\ProductCategory entity.');
        }

        $editForm   = $this->createForm(new ProductCategoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('staff_product_category_edit', array('id' => $id)));
        }

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Product\ProductCategory entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product\ProductCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('staff_product_category'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
