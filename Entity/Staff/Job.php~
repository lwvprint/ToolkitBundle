<?php

namespace LWV\ToolkitBundle\Entity\Staff;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * LWV\ToolkitBundle\Entity\Staff\Job
 *
 * @ORM\Table(name="job")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Staff\JobRepository")
 */
class Job
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**
     * @ORM\OneToMany(targetEntity="LWV\ToolkitBundle\Entity\Order\Order", mappedBy="job")
     *
     */
    protected $orders;

    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add orders
     *
     * @param LWV\ToolkitBundle\Entity\Order\Order $orders
     */
    public function addOrder(\LWV\ToolkitBundle\Entity\Order\Order $orders)
    {
        $this->orders[] = $orders;
    }

    /**
     * Get orders
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}