<?php

namespace LWV\ToolkitBundle\Entity\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\Order\Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Order\OrderRepository")
 */
class Order
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
     * @ORM\OneToOne(targetEntity="LWV\ToolkitBundle\Entity\User\Company, inversedBy="orders")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     *
     */
    protected $company;

    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Job\Job", inversedBy="orders")
     * @ORM\JoinColumn(name="job_id", referencedColumnName="id")
     *
     */
    protected $job;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="order")
     *
     */
    protected $order_items;

    public function __construct()
    {
        $this->order_items = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set job
     *
     * @param LWV\ToolkitBundle\Entity\Job\Job $job
     * @return Order
     */
    public function setJob(\LWV\ToolkitBundle\Entity\Job\Job $job = null)
    {
        $this->job = $job;
        return $this;
    }

    /**
     * Get job
     *
     * @return LWV\ToolkitBundle\Entity\Job\Job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Add order_items
     *
     * @param LWV\ToolkitBundle\Entity\Order\Item $orderItems
     */
    public function addItem(\LWV\ToolkitBundle\Entity\Order\Item $orderItems)
    {
        $this->order_items[] = $orderItems;
    }

    /**
     * Get order_items
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getOrderItems()
    {
        return $this->order_items;
    }
}