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
            $cMonth = date('n - 1');
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
        // Find events based on User's Toolkit. Fall back to Company
        $events = $this->get('doctrine')->getEntityManager()
                    ->getRepository('LWVToolkitBundle:Frontend\Event')
                    ->findAll();
        
        // Test data
        //$events = new Response(json_encode(array(array('id' => 1, 'color' => '#CCC', 'title' => 'Test Event', 'start' => '2012-03-09', 'end' => '2012-03-10', 'url' => '/events/view/Test-Event'), array('id' => 2, 'title' => 'Event 2', 'start' => '2012-03-12'))));
        
        // Return JSON Object
        $view = View::create()
                ->setStatusCode(200)
                ->setData($events);

        return $this->get('fos_rest.view_handler')->handle($view);

    }
    
    public function viewAction($slug)
    {
        $event = $slug;
        
        /*
         * Initiate and insert a breadcrumb
         */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Events", $this->get("router")->generate("events"));
        $breadcrumbs->addItem($slug, $this->get("router")->generate("events"));
        
        return $this->render('LWVToolkitBundle:Frontend\Events:event.html.twig', array('event' => $event));
    }
}