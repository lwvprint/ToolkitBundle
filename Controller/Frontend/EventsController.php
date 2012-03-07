<?php

namespace LWV\ToolkitBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventsController extends Controller
{
    public function indexAction($year = NULL, $month = NULL)
    {
        /*
         * Initiate and insert a breadcrumb
         */
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));
        $breadcrumbs->addItem("Events", $this->get("router")->generate("events"));
            
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

        return $this->render('LWVToolkitBundle:Frontend\Events:events.html.twig', array('dateInfo' => $dateInfo));
    }
    
    public function viewAction()
    {
        
    }
}