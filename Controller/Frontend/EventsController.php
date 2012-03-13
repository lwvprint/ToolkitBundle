<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\View\View;

class EventsController extends Controller
{
    public function indexAction($year = NULL, $month = NULL)
    {   
        /*
        if($year == NULL) {
            $cYear = date('Y');
        } else {
            $cYear = $year;
        }
        
        if($month == NULL) {
            $cMonth = date('n');
            $currentMonth = date('F');
        } else {
            $cMonth = $month;
            $currentMonth = date('F', mktime(0,0,0,$cMonth,1,$cYear));
        }
        

        $prev_year = $cYear;
        $next_year = $cYear;
        $prev_month = $cMonth-1;
        $next_month = $cMonth+1;

        if ($prev_month == 0 ) {
            $prev_month = 12;
            $prev_year = $cYear - 1;
        }
        if ($next_month == 13 ) {
            $next_month = 1;
            $next_year = $cYear + 1;
        }

        $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
        $maxday = date("t",$timestamp);
        $thismonth = getdate($timestamp);
        $startday = $thismonth['wday'];
        
        $dateInfo = array('maxday' => $maxday, 'thismonth' => $thismonth, 'startday' => $startday, 'currentYear' => $cYear, 'currentMonth' => $currentMonth);
        */
        
        if($year == NULL) {
            $cYear = date('Y');
        } else {
            $cYear = $year;
        }
        
        if($month == NULL) {
            $cMonth = date('n') - 1;
        } else {
            $cMonth = $month - 1;
        }
        
        $calendarSettings = array('year' => $cYear, 'month' => $cMonth);
        
        /*
         * Initiate and insert a breadcrumb
         */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Events", $this->get("router")->generate("events"));

        return $this->render('LWVToolkitBundle:Frontend\Events:events.html.twig', array('calendarSettings' => $calendarSettings));
    }
    
    public function jsonAction()
    {
        // Fetch GET values
        $start = $this->getRequest()->query->get('start');
        $end = $this->getRequest()->query->get('end');
        
        // Convert UNIX Timestamp to YYYY-MM-DD HH:MM:SS DateTime
        $start = date('Y-m-d H:i:s', $start);
        $end = date('Y-m-d H:i:s', $end);
        
        // Find events based on User's Toolkit. Fall back to Company
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery('SELECT e FROM LWVToolkitBundle:Frontend\Event e WHERE e.start >= :start AND e.start <= :end')
                ->setParameters(array('start' => $start, 'end' =>$end));

        $events = $query->getResult();
        
        //$events = $this->get('doctrine')->getEntityManager()
                    //->getRepository('LWVToolkitBundle:Frontend\Event')
                    //->findBy(array('start'));
        
        // Return JSON Object
        $view = View::create()
                ->setStatusCode(200)
                ->setData($events);

        // Return view
        return $this->get('fos_rest.view_handler')->handle($view);

    }
    
    public function viewAction($slug)
    {
        $event = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Frontend\Event')
                ->findOneBy(array('slug' => $slug));
        
        /*
         * Initiate and insert a breadcrumb
         */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Events", $this->get("router")->generate("events"));
        $breadcrumbs->addItem($event->getTitle(), $this->get("router")->generate("events"));
        
        return $this->render('LWVToolkitBundle:Frontend\Events:single-event.html.twig', array('event' => $event));
    }
}