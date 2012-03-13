<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JobController extends Controller
{
    public function latestJobsAction($max = 3)
    {
		$user = $this->get('security.context')->getToken()->getUser();

        $jobsRepo = $this->get('doctrine')->getEntityManager()
                ->getRepository('LWVToolkitBundle:Job\Job');

        $jobsQuery = $jobsRepo->createQueryBuilder('j')
          		->where('j.staff = :staff')
          		->setParameter('staff', $user->getId())
        		->setMaxResults($max)
        		->getQuery();
        $jobs = $jobsQuery->getResult();

		return $this->render('LWVToolkitBundle:Staff\Includes:latest-jobs.html.twig', array('jobs' => $jobs));

    }
}
