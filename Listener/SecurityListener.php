<?php

namespace LWV\ToolkitBundle\Listener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    public function __construct(ContainerInterface $container)
    {
		$this->container = $container;
		$this->security = $this->container->get('security.context');
		$this->router = $this->container->get('router');
    }

    /**
     * Invoked after a successful login.
     *
     * @param InteractiveLoginEvent $event The event
     */
    public function onPageLoad(GetResponseEvent $event)
    {
	    if ($event->getRequestType() !== \Symfony\Component\HttpKernel\HttpKernel::MASTER_REQUEST) {
            return;
        }
    	$request = $event->getRequest();

    	/*
    	 * Check if the current route exists, else throw a 404.
    	*/

    	if (false === $this->router->match($request->getPathInfo())) {
    		throw new NotFoundHttpException('Could not find route for " '. $request->getPathInfo() .' "');
    	}

    	if (null !== $this->security->getToken() && false === $this->security->isGranted('ROLE_LWV') && $this->security->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
	        $user = $this->security->getToken()->getUser();
	        $company = $user->getCompany();
	        $toolkit = $company->getToolkit();
	        if ($toolkit->getMaintenanceMode() == 1) {
	            //$this->redirectToAdmin = true;
	            throw new NotFoundHttpException('Maintenance Mode Enabled.');
		    }

    	}

    }

    /**
     * Invoked after the response has been created.
     *
     * @param FilterResponseEvent $event The event
     */


    public function onKernelResponse(FilterResponseEvent $event)
    {
        if($this->redirectToAdmin) {
            $event->setResponse(new RedirectResponse($this->router->generate('maintenance_page')));
            //throw new NotFoundHttpException('Maintenance Mode Enabled');
        }
    }

}