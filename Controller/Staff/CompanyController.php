<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LWV\ToolkitBundle\Entity\User\Company;
use LWV\ToolkitBundle\Form\User\CompanyType;

/**
 * User\Company controller.
 *
 */
class CompanyController extends Controller
{
    /**
     * Lists all User\Company entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LWVToolkitBundle:User\Company')->findBy(array('lvl' => 0));
        //$entities = $em->getRepository('LWVToolkitBundle:User\Company')->getCompanyWithParent();
        
        return $this->render('LWVToolkitBundle:Staff/Company:company.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a User\Company entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:User\Company')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User\Company entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LWVToolkitBundle:Staff/Company:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new User\Company entity.
     *
     */
    public function newAction()
    {
        $entity = new Company();
        $form   = $this->createForm(new CompanyType(), $entity);

        return $this->render('LWVToolkitBundle:Staff/Company:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new User\Company entity.
     *
     */
    public function createAction()
    {
        $entity  = new Company();
        $request = $this->getRequest();
        $form    = $this->createForm(new CompanyType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('staff_company_show', array('id' => $entity->getId())));
        }

        return $this->render('LWVToolkitBundle:Staff/Company:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User\Company entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:User\Company')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User\Company entity.');
        }

        $editForm = $this->createForm(new CompanyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LWVToolkitBundle:Staff/Company:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing User\Company entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LWVToolkitBundle:User\Company')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User\Company entity.');
        }

        $editForm   = $this->createForm(new CompanyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('staff_company'));
        }

        return $this->render('LWVToolkitBundle:Staff/Company:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User\Company entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LWVToolkitBundle:User\Company')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User\Company entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('staff_company'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}