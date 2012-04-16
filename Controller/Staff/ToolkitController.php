<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

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
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LWVToolkitBundle:Toolkit\Toolkit')->findAll();

        return $this->render('LWVToolkitBundle:Staff/Toolkit:toolkit.html.twig', array(
            'entities' => $entities,
        ));
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
                
                if($postData['theme'] != NULL){
                    //$themeId = $postData['theme'];
                    //$entity->setTheme();
                } else {
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
