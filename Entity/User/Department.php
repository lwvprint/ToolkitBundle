<?php

namespace LWV\ToolkitBundle\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\User\Department
 *
 * @ORM\Table(name="user_department")
 * @ORM\Entity
 */
class Department
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $head_id
     *
     * @ORM\Column(name="head_id", type="integer")
     */
    private $head_id;


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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set department_head_id
     *
     * @param integer $departmentHeadId
     */
    public function setDepartmentHeadId($departmentHeadId)
    {
        $this->department_head_id = $departmentHeadId;
    }

    /**
     * Get department_head_id
     *
     * @return integer
     */
    public function getDepartmentHeadId()
    {
        return $this->department_head_id;
    }

    /**
     * Set head_id
     *
     * @param integer $headId
     */
    public function setHeadId($headId)
    {
        $this->head_id = $headId;
    }

    /**
     * Get head_id
     *
     * @return integer
     */
    public function getHeadId()
    {
        return $this->head_id;
    }
}