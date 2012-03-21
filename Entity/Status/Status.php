<?php

namespace LWV\ToolkitBundle\Entity\Status;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity()
 * @ORM\Table(name="status")
 */
class Status
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var array $status_group
     * 
     * @ORM\Column(type="array")
     */
    protected $status_group;

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
     * Set status_group
     *
     * @param array $statusGroup
     * @return Status
     */
    public function setStatusGroup($statusGroup)
    {
        $this->status_group = $statusGroup;
        return $this;
    }

    /**
     * Get status_group
     *
     * @return array 
     */
    public function getStatusGroup()
    {
        return $this->status_group;
    }
}