<?php

namespace LWV\ToolkitBundle\Entity\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Order\OrderRepository")
 * @ORM\Table(name="orders")
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
     * @var datetime $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated_at;


    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\User\Company", inversedBy="orders")
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
     * Set company
     *
     * @param LWV\ToolkitBundle\Entity\User\Company $company
     * @return Order
     */
    public function setCompany(\LWV\ToolkitBundle\Entity\User\Company $company = null)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Get company
     *
     * @return LWV\ToolkitBundle\Entity\User\Company
     */
    public function getCompany()
    {
        return $this->company;
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

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Order
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    /**
     * Get created_at
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     * @return Order
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}