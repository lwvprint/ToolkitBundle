<?php

namespace LWV\ToolkitBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;

use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

use LWV\ToolkitBundle\Entity\User\User;
use LWV\ToolkitBundle\Form\Type\User\PasswordResetType;
use LWV\ToolkitBundle\Form\Type\User\PasswordRequestType;

class ResetController extends Controller
{
    public function passwordRequestAction(Request $request)
    {
        $form = $this->createForm(new PasswordRequestType());
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $postData = $request->request->get('requestpass');
                
                $email = $postData['email'];
                
                $user = $this->getDoctrine()
                        ->getRepository('LWVToolkitBundle:User\User')
                        ->findOneBy(array('email' => $email));

                if (!$user) {
                    throw $this->createNotFoundException('No user found for email '.$email.'!');
                }
                
                $token = md5($user->getUsername().'|'.date('Y-m-d'));
                $user->setResetToken($token);
                
                $tokenDate = new \DateTime('now');
                $user->setResetTokenDate($tokenDate);
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();
                
                $message = \Swift_Message::newInstance()
                        ->setSubject('Password Reset Request')
                        ->setFrom('send@example.com')
                        ->setTo($user->getEmail())
                        ->setContentType('text/html')
                        ->setBody($this->renderView('LWVToolkitBundle:User\Reset:password-email.html.twig', array('user' => $user, 'token' => $token)));
                $this->get('mailer')->send($message);
    
            }
            
        }
        
        return $this->render('LWVToolkitBundle:User\Reset:password-request.html.twig', array('form' => $form->createView()));
    }
    
    public function passwordResetAction(Request $request, $key = NULL)
    {
        $user = $this->getDoctrine()
                ->getRepository('LWVToolkitBundle:User\User')
                ->findOneBy(array('resetToken' => $key));

        if (!$user) {
            throw $this->createNotFoundException('No user found for reset token '.$key.'!');
        }
        
        $tokenDate = $user->getResetTokenDate()->format('Y-m-d H:i:s');
        
        if ( strtotime( $tokenDate ) <= strtotime('-1 day') ) {
            throw $this->createNotFoundException('Token expired!');
        }
        
        $form = $this->createForm(new PasswordResetType(), $user);
                
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $postData = $request->request->get('resetpass');
                
                $newPassword = $postData['password'];
                //$token = $postData['token'];
                
                $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
                $password = $encoder->encodePassword($newPassword, $user->getSalt());
                $user->setPassword($password);
                
                //$newToken = base64_encode($user->getUsername().'|'.date('Y-m-d'));
                $user->setResetToken(NULL);

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();

                //$this->get('session')->setFlash('success', 'Password changed. Please login using your new password.');

                return $this->redirect($this->generateUrl('password_reset_success'));
            }

        }
        
        return $this->render('LWVToolkitBundle:User\Reset:password-reset.html.twig', array('key' => $key, 'form' => $form->createView()));
    }
    
    public function passwordSuccessAction()
    {
        return $this->render('LWVToolkitBundle:User\Reset:password-success.html.twig');
    }
}