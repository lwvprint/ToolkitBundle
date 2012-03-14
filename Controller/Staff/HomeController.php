<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LWV\ToolkitBundle\Entity\Category\Category;

class HomeController extends Controller
{
    public function indexAction()
    {
        /*
         * Initiate and insert a breadcrumb
        */

		/*$food = new Category();
		$food->setName('Food');
		$food->setSlug('food');
		$food->setDescription('food description');
		$food->setImage('http://placehold.it/150x150');
		$food->setCreatedAt(new \DateTime('now'));
		$food->setUpdatedAt(new \DateTime('now'));

		$fruits = new Category();
		$fruits->setName('Fruits');
		$fruits->setSlug('fruits');
		$fruits->setDescription('fruits description');
		$fruits->setImage('http://placehold.it/150x150');
		$fruits->setCreatedAt(new \DateTime('now'));
		$fruits->setUpdatedAt(new \DateTime('now'));
		$fruits->setParent($food);

		$vegetables = new Category();
		$vegetables->setName('Vegetables');
		$vegetables->setSlug('vegetables');
		$vegetables->setDescription('vegetables description');
		$vegetables->setImage('http://placehold.it/150x150');
		$vegetables->setCreatedAt(new \DateTime('now'));
		$vegetables->setUpdatedAt(new \DateTime('now'));
		$vegetables->setParent($food);

		$carrots = new Category();
		$carrots->setName('Carrots');
		$carrots->setSlug('carrots');
		$carrots->setDescription('carrots description');
		$carrots->setImage('http://placehold.it/150x150');
		$carrots->setCreatedAt(new \DateTime('now'));
		$carrots->setUpdatedAt(new \DateTime('now'));

		$carrots->setParent($vegetables);

		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($food);
		$em->persist($fruits);
		$em->persist($vegetables);
		$em->persist($carrots);
		$em->flush();*/


        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("shop"));

        $this->get('session')->getFlashBag()->set('notice', 'NOTICING');

        return $this->render('LWVToolkitBundle:Staff\Home:home.html.twig');
    }
}
