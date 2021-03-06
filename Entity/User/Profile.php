<?php

namespace LWV\ToolkitBundle\Entity\User;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\User\Profile
 *
 * @ORM\Table(name="user_profile")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\User\ProfileRepository")
 */
class Profile
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=50)
     */
    protected $name;

    /**
     * @ORM\Column(name="pub_name", type="string", length=50)
     */
    protected $pubName;

    /**
     * @ORM\Column(name="address1", type="string", length=255)
     */
    protected $address1;

    /**
     * @ORM\Column(name="address2", type="string", length=255)
     */
    protected $address2;

    /**
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\Column(name="county", type="string", length=255)
     */
    protected $county;

    /**
     * @ORM\Column(name="postcode", type="string", length=8)
     */
    protected $postcode;

    /**
     * @ORM\Column(name="telephone", type="string", length=25)
     */
    protected $telephone;

    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="profile")
     *
     */
    protected $user;


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
     * Set pubName
     *
     * @param string $pubName
     */
    public function setPubName($pubName)
    {
        $this->pubName = $pubName;
    }

    /**
     * Get pubName
     *
     * @return string
     */
    public function getPubName()
    {
        return $this->pubName;
    }

    /**
     * Set address1
     *
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set county
     *
     * @param string $county
     */
    public function setCounty($county)
    {
        $this->county = $county;
    }

    /**
     * Get county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set postcode
     *
     * @param text $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * Get postcode
     *
     * @return text
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set user
     *
     * @param LWV\ToolkitBundle\Entity\User\User $user
     */
    public function setUser(\LWV\ToolkitBundle\Entity\User\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return LWV\ToolkitBundle\Entity\User\User
     */
    public function getUser()
    {
        return $this->user;
    }
}