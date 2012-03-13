<?php

namespace LWV\ToolkitBundle\Entity\Job;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * LWV\ToolkitBundle\Entity\Job\Job
 *
 * @ORM\Table(name="job")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Job\JobRepository")
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

    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\User\Company", inversedBy="company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     *
     */
    protected $company;

    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\User\User", inversedBy="staff")
     * @ORM\JoinColumn(name="staff_id", referencedColumnName="id")
     *
     */
    protected $staff;

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

    /**
     * Set company
     *
     * @param LWV\ToolkitBundle\Entity\User\Company $company
     * @return Job
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
     * Set staff
     *
     * @param LWV\ToolkitBundle\Entity\User\User $staff
     * @return Job
     */
    public function setStaff(\LWV\ToolkitBundle\Entity\User\User $staff = null)
    {
        $this->staff = $staff;
        return $this;
    }

    /**
     * Get staff
     *
     * @return LWV\ToolkitBundle\Entity\User\User 
     */
    public function getStaff()
    {
        return $this->staff;
    }
}