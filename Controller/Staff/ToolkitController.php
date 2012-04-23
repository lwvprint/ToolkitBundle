<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandler;

use LWV\ToolkitBundle\Entity\Toolkit\Toolkit;
use LWV\ToolkitBundle\Form\Toolkit\ToolkitType;

use LWV\ToolkitBundle\Entity\Theme\Theme;

/**
 * Toolkit\Toolkit controller.
 *
 */
class ToolkitController extends Controller
{
    /**
     * Lists all Toolkit\Toolkit entities.
     *
     */
    public function indexAction()
    {
        //$em = $this->getDoctrine()->getEntityManager();
        //$entities = $em->getRepository('LWVToolkitBundle:Toolkit\Toolkit')->findAll();
        
        //$em = $this->get('doctrine.orm.entity_manager');
        //$dql = "SELECT a FROM LWVToolkitBundle:Toolkit\Toolkit a";
        //$query = $em->createQuery($dql);
        
        //$paginator = $this->get('knp_paginator');
        /*$entities = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            10
        );*/

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Toolkits", $this->get("router")->generate("staff_toolkit"));
        
        return $this->render('LWVToolkitBundle:Staff/Toolkit:toolkit.html.twig', array(
            //'entities' => $entities,
        ));
    }
    
    public function restAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT t.id, t.name, t.slug, t.url, t.is_active FROM LWVToolkitBundle:Toolkit\Toolkit t";
        $query = $em->createQuery($dql);
        
        $entities = $query->getArrayResult();
        
        //foreach($entities as &$entity) {
        //    $entity['null'] = 'null';
        //}
        
        $view = View::create()
                ->setData(array('aaData' => $entities))
                ->setFormat('json')
                ->setStatusCode(200);

        // Return view
        return $this->get('fos_rest.view_handler')->handle($view);
    }

    /**
     * Finds and displays a Toolkit\Toolkit entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Toolkit\Toolkit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Toolkit\Toolkit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Toolkits", $this->get("router")->generate("staff_toolkit"));
        $breadcrumbs->addItem("". $entity->getName() . "", $this->get("router")->generate("staff_toolkit_show", array('id' => $entity->getId())));
        
        return $this->render('LWVToolkitBundle:Staff/Toolkit:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Toolkit\Toolkit entity.
     *
     */
    public function newAction()
    {
        $entity = new Toolkit();
        $form   = $this->createForm(new ToolkitType(), $entity);

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Toolkits", $this->get("router")->generate("staff_toolkit"));
        $breadcrumbs->addItem("New Toolkit", $this->get("router")->generate("staff_toolkit_new"));

        return $this->render('LWVToolkitBundle:Staff/Toolkit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Toolkit\Toolkit entity.
     *
     */
    public function createAction()
    {
        $entity  = new Toolkit();
        $theme = new Theme();
        $request = $this->getRequest();
        $form    = $this->createForm(new ToolkitType(), $entity);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $postData = $request->request->get('toolkit');
                
                if($postData['new_theme']['theme_name'] != NULL){
                    $name = $postData['new_theme']['theme_name'];
                    $path = $postData['new_theme']['theme_path'];
                    
                    $theme->setName($name);
                    $theme->setPath($path);
                    
                    $entity->setTheme($theme);
                }
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($theme);
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('staff_toolkit_show', array('id' => $entity->getId())));
            }
        }

        return $this->render('LWVToolkitBundle:Staff/Toolkit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Toolkit\Toolkit entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Toolkit\Toolkit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Toolkit\Toolkit entity.');
        }

        $editForm = $this->createForm(new ToolkitType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("staff_home"));
        $breadcrumbs->addItem("Toolkits", $this->get("router")->generate("staff_toolkit"));
        $breadcrumbs->addItem("". $entity->getName() . "", $this->get("router")->generate("staff_toolkit_show", array('id' => $entity->getId())));
        $breadcrumbs->addItem("Edit", null);

        return $this->render('LWVToolkitBundle:Staff/Toolkit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Toolkit\Toolkit entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:Toolkit\Toolkit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Toolkit\Toolkit entity.');
        }

        $editForm   = $this->createForm(new ToolkitType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            // Set flash message
            //$this->get('session')->getFlashBag()->add('info', 'message');
            //$this->get('session')->getFlashBag()->add('info', 'message 2');


            return $this->redirect($this->generateUrl('staff_toolkit_edit', array('id' => $id)));
        }

        return $this->render('LWVToolkitBundle:Staff/Toolkit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Toolkit\Toolkit entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LWVToolkitBundle:Toolkit\Toolkit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Toolkit\Toolkit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('staff_toolkit'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
