<?php

namespace LWV\ToolkitBundle\Entity\Job;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * LWV\ToolkitBundle\Entity\Job\Job
 *
 * @ORM\Table(name="job", uniqueConstraints={@ORM\UniqueConstraint(name="reference_unique",columns={"reference_no"})})
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
      * @var string $reference_no
      *
      * @ORM\Column(type="string", length=100)
     */
    protected $reference_no;

    /**
     * @ORM\ManyToOne(targetEntity="Priority", inversedBy="priority")
     * @ORM\JoinColumn(name="job_priority", referencedColumnName="id")
     *
     */
    protected $priority;

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

    /**
     * Set reference_no
     *
     * @param string $referenceNo
     * @return Job
     */
    public function setReferenceNo($referenceNo)
    {
        $this->reference_no = $referenceNo;
        return $this;
    }

    /**
     * Get reference_no
     *
     * @return string
     */
    public function getReferenceNo()
    {
        return $this->reference_no;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Job
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
     * @return Job
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

    /**
     * Set priority
     *
     * @param LWV\ToolkitBundle\Entity\Job\Priority $priority
     * @return Job
     */
    public function setPriority(\LWV\ToolkitBundle\Entity\Job\Priority $priority = null)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Get priority
     *
     * @return LWV\ToolkitBundle\Entity\Job\Priority
     */
    public function getPriority()
    {
        return $this->priority;
    }
}