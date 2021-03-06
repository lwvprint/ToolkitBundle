<?php
namespace LWV\ToolkitBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

use LWV\ToolkitBundle\Entity\User\Profile;
use LWV\ToolkitBundle\Entity\User\User;
use LWV\ToolkitBundle\Form\Type\User\ProfileType;
use LWV\ToolkitBundle\Form\Type\User\UserType;

class DashboardController extends Controller
{

    public function profileAction(Request $request)
    {

        $user = $this->get('security.context')->getToken()->getUser();

        $form = $this->createForm(new UserType(), $user);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // Get $_POST data and submit to DB
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();

                // Set "success" flash notification
                // $this->get('session')->setFlash('success', 'Profile saved.');
            }

        }
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("My Account", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("My Profile", $this->get("router")->generate("shop"));

        return $this->render('LWVToolkitBundle:User\Dashboard:profile.html.twig', array('form' => $form->createView()));
    }

    public function passwordAction(Request $request)
    {
        $id = $this->get('security.context')->getToken()->getUser()->getId();

        $user = $this->getDoctrine()
                ->getRepository('LWVToolkitBundle:User\User')
                ->find($id);

        $form = $this->createFormBuilder($user)
                ->add('oldPassword', 'password', array('label' => 'Old Password', 'property_path' => false))
                ->add('newPassword', 'password', array('label' => 'New Password', 'property_path' => false))
                ->add('confirmPassword', 'password', array('label' => 'Confirm Password', 'property_path' => false))
                ->addValidator(new CallbackValidator(function($form) use($user)
                {

                    $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
                    //$encoder = $this->container->get('toolkit_encoder')->getEncoder($user);
                    $password = $encoder->encodePassword($form['oldPassword']->getData(), $user->getSalt());

                    if($password != $user->getPassword()) {
                        $form['oldPassword']->addError(new FormError('Incorrect password'));
                    }

                    if($form['confirmPassword']->getData() != $form['newPassword']->getData()) {
                        $form['confirmPassword']->addError(new FormError('Passwords must match.'));
                    }
                    if($form['newPassword']->getData() == '') {
                        $form['newPassword']->addError(new FormError('Password cannot be blank.'));
                    }
                }))
                ->getForm();

        //$form = $this->createForm(new PasswordType());

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $postData = $request->request->get('form');
                $newPassword = $postData['newPassword'];

                $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
                $password = $encoder->encodePassword($newPassword, $user->getSalt());
                $user->setPassword($password);

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();

                $this->get('session')->setFlash('success', 'Password changed. Please logout and login using your new password.');

                return $this->redirect($this->generateUrl('password'));
            }

        }
        
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("My Account", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Change My Password", $this->get("router")->generate("shop"));

        return $this->render('LWVToolkitBundle:User\Dashboard:password.html.twig', array('form' => $form->createView()));
    }
}
