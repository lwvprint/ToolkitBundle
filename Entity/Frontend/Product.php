<?php

namespace LWV\ToolkitBundle\Entity\Frontend;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Frontend\ProductRepository")
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $reference;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $activeFrom;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $activeTill;

    /**
     * @ORM\Column(type="integer")
     */
    protected $visible;

    /**
     * @ORM\OneToMany(targetEntity="ProductImage", mappedBy="product")
     */
    protected $images;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
    
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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
     * Set slug
     *
     * @param string $slug
     * @return Product
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Product
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set activeFrom
     *
     * @param datetime $activeFrom
     * @return Product
     */
    public function setActiveFrom($activeFrom)
    {
        $this->activeFrom = $activeFrom;
        return $this;
    }

    /**
     * Get activeFrom
     *
     * @return datetime 
     */
    public function getActiveFrom()
    {
        return $this->activeFrom;
    }

    /**
     * Set activeTill
     *
     * @param datetime $activeTill
     * @return Product
     */
    public function setActiveTill($activeTill)
    {
        $this->activeTill = $activeTill;
        return $this;
    }

    /**
     * Get activeTill
     *
     * @return datetime 
     */
    public function getActiveTill()
    {
        return $this->activeTill;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return Product
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
        return $this;
    }

    /**
     * Get visible
     *
     * @return integer 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Add images
     *
     * @param LWV\ToolkitBundle\Entity\Frontend\ProductImage $images
     */
    public function addProductImage(\LWV\ToolkitBundle\Entity\Frontend\ProductImage $images)
    {
        $this->images[] = $images;
    }

    /**
     * Get images
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set category
     *
     * @param LWV\ToolkitBundle\Entity\Frontend\Category $category
     * @return Product
     */
    public function setCategory(\LWV\ToolkitBundle\Entity\Frontend\Category $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return LWV\ToolkitBundle\Entity\Frontend\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}