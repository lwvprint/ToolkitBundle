<?php

namespace LWV\ToolkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="lwv_setting")
 */
class Setting {

	/**
	 * @var string
	 * @ORM\Id
	 * @ORM\Column(name="name", type="string", nullable=false, unique=true)
	 * @Assert\NotBlank
	 */
	protected $name;

	/**
	 * @var string
	 * @ORM\Id
	 * @ORM\Column(name="nice_name", type="string")
	 */
	protected $niceName;

	/**
	 * @var string
	 * @ORM\Id
	 * @ORM\Column(name="description", type="string")
	 */
	protected $description;

	/**
	 * @var string
	 * @ORM\Column(name="value", type="string", nullable=true)
	 */
	protected $value;

	/**
	 * @var string
	 * @ORM\Column(name="section", type="string", nullable=true)
	 */
	protected $section;

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setValue($value) {
		$this->value = $value;
	}

	public function getValue() {
		return $this->value;
	}

	public function setSection($section) {
		$this->section = $section;
	}

	public function getSection() {
		return $this->section;
	}


    /**
     * Set niceName
     *
     * @param string $niceName
     * @return Setting
     */
    public function setNiceName($niceName)
    {
        $this->niceName = $niceName;
        return $this;
    }

    /**
     * Get niceName
     *
     * @return string
     */
    public function getNiceName()
    {
        return $this->niceName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Setting
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}