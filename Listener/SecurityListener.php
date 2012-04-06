<?php
 
namespace LWV\ToolkitBundle\Listener;
 
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
 
/**
 * SecurityListener.
 * 
 * @author Dustin Dobervich
 */
class SecurityListener
{   
    /**
     * @var Router $router
     */
    private $router;
 
    /**
     * @var SecurityContext $security
     */
    private $security;
 
    /**
     * Constructs a new instance of SecurityListener.
     * 
     * @param Router $router The router
     * @param SecurityContext $security The security context
     */
    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router = $router;
        $this->security = $security;
    }
 
    /**
     * Invoked after a successful login.
     * 
     * @param InteractiveLoginEvent $event The event
     */
    public function onSecurityInteractiveLogin(GetResponseEvent $event)
    {
        $user = $this->security->getToken()->getUser();
        $company = $user->getCompany();
        $toolkit = $company->getToolkit();

        if ($toolkit->getMaintenanceMode() == 1) {
            //$this->redirectToAdmin = true;
            throw new NotFoundHttpException('Maintenance Mode Enabled');
        }
    }
 
    /**
     * Invoked after the response has been created.
     * 
     * @param FilterResponseEvent $event The event
     */
    
    /*
    public function onKernelResponse(FilterResponseEvent $event)
    {
        if($this->redirectToAdmin) {
            $event->setResponse(new RedirectResponse($this->router->generate('maintenance_page')));
            //throw new NotFoundHttpException('Maintenance Mode Enabled');
        }
    }
    */
}