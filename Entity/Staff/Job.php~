<?php

namespace LWV\ToolkitBundle\Entity\Staff;

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
     * @var string $reference_no
     *
     * @ORM\Column(name="reference_no", type="string", length=100)
     */
    private $reference_no;

    /**
     * @var integer $staff_id
     *
     * @ORM\Column(name="staff_id", type="integer")
     */
    private $staff_id;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @var datetime $deleted_at
     *
     * @ORM\Column(name="deleted_at", type="datetime")
     */
    private $deleted_at;


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
     * Set staff_id
     *
     * @param integer $staffId
     * @return Job
     */
    public function setStaffId($staffId)
    {
        $this->staff_id = $staffId;
        return $this;
    }

    /**
     * Get staff_id
     *
     * @return integer
     */
    public function getStaffId()
    {
        return $this->staff_id;
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
     * Set deleted_at
     *
     * @param datetime $deletedAt
     * @return Job
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;
        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return datetime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}