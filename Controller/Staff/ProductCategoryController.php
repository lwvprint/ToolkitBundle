<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    public function indexAction($parent, $slug)
    {
        $toolkit = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Toolkit\Toolkit')
                ->findOneBy(array('slug' => $slug));
        
        if (!$toolkit) {
            throw $this->createNotFoundException('Unable to find Toolkit.');
        }
        
        $toolkitId = $toolkit->getId();
        
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->findBy(array('parent' => $parent, 'toolkit' => $toolkitId));
        //$entities = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->findAll();

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Toolkit List", $this->get("router")->generate("staff_toolkit"));
        $breadcrumbs->addItem($toolkit->getName(), $this->get("router")->generate("staff_toolkit"));
        $breadcrumbs->addItem("Category List", $this->get("router")->generate("staff_product_category", array('slug' => $slug)));
        
        if($parent != null) {
            $em = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\ProductCategory')
                ->findOneBy(array('id' => $parent, 'toolkit' => $toolkitId));
            $breadcrumbs->addItem($em->getName(), null);
        }
        
        return $this->render('LWVToolkitBundle:Staff/ProductCategory:productCategory.html.twig', array(
            'entities' => $entities,
            'slug' => $slug
        ));
    }

    /**
     * Finds and displays a Product\ProductCategory entity.
     *
     */
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("staff_product_category", array('slug' => $slug)));
        $breadcrumbs->addItem($entity->getName(), null);

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'slug' => $slug
        ));
    }

    /**
     * Displays a form to create a new Product\ProductCategory entity.
     *
     */
    public function newAction($slug)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Toolkit\Toolkit')
                    ->findOneBy(array('slug' => $slug));
        
        $entity = new ProductCategory();
        $entity->setToolkit($em);
        
        $form   = $this->createForm(new ProductCategoryType(), $entity);
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("staff_product_category", array('slug' => $slug)));
        $breadcrumbs->addItem("New Category", null);

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'slug' => $slug
        ));
    }

    /**
     * Creates a new Product\ProductCategory entity.
     *
     */
    public function createAction($slug)
    {
        $entity = new ProductCategory();
        $uploadDir = '../web/uploads/images/'.$slug;
        
        $request = $this->getRequest();
        
        $form = $this->createForm(new ProductCategoryType(), $entity);
        
        $form->bindRequest($request);

        if ($form->isValid()) {
            $postData = $request->request->get('product_category');
                
            $categorySlug = $postData['slug'];
                
            // Create folders in upload dir
            if(!file_exists($uploadDir)) {
                @mkdir($uploadDir);
            }
            
            $targetDir = $uploadDir.'/'.$categorySlug;
            
            if(!file_exists($targetDir)) {
                @mkdir($targetDir);
            }
            
            $entity->setImage($targetDir.'/'.$entity->file->getClientOriginalName());
            
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('staff_product_category_show', array('id' => $entity->getId(), 'slug' => $slug)));
        }

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'slug' => $slug
        ));
    }

    /**
     * Displays a form to edit an existing Product\ProductCategory entity.
     *
     */
    public function editAction($id, $slug)
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
        $breadcrumbs->addItem("Categories", $this->get("router")->generate("staff_product_category", array('slug' => $slug)));
        $breadcrumbs->addItem("". $entity->getName() . "", $this->get("router")->generate("staff_product_category_show", array('id' => $entity->getId(), 'slug' => $slug)));
        $breadcrumbs->addItem("Edit", null);

        return $this->render('LWVToolkitBundle:Staff/ProductCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'slug' => $slug
        ));
    }

    /**
     * Edits an existing Product\ProductCategory entity.
     *
     */
    public function updateAction($id, $slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Product\ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product Category.');
        }

        $editForm   = $this->createForm(new ProductCategoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('staff_product_category_edit', array('id' => $id, 'slug' => $slug)));
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
                throw $this->createNotFoundException('Unable to find Product Category.');
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
