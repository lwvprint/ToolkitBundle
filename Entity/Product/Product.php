<?php

namespace LWV\ToolkitBundle\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Product\ProductRepository")
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
     * @ORM\Column(type="string", length=255)
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
     * @ORM\Column(type="datetime", length=25)
     */
    protected $active_from;

    /**
     * @ORM\Column(type="datetime", length=25)
     */
    protected $active_till;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_active;
    
    /**
     * @var date $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", length=25)
     */
    protected $created_at;

    /**
     * @var date $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", length=25, nullable=true)
     */
    protected $updated_at;
    
    /**
     * @ORM\Column(type="datetime", length=25, nullable=true)
     */
    protected $deleted_at;

    /**
     * @ORM\OneToMany(targetEntity="ProductImage", mappedBy="product")
     */
    protected $images;

    /**
     * @ORM\ManyToOne(targetEntity="ProductCategory", inversedBy="products")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
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
     * Set active_from
     *
     * @param datetime $activeFrom
     * @return Product
     */
    public function setActiveFrom($activeFrom)
    {
        $this->active_from = $activeFrom;
        return $this;
    }

    /**
     * Get active_from
     *
     * @return datetime 
     */
    public function getActiveFrom()
    {
        return $this->active_from;
    }

    /**
     * Set active_till
     *
     * @param datetime $activeTill
     * @return Product
     */
    public function setActiveTill($activeTill)
    {
        $this->active_till = $activeTill;
        return $this;
    }

    /**
     * Get active_till
     *
     * @return datetime 
     */
    public function getActiveTill()
    {
        return $this->active_till;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Product
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Product
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
     * @return Product
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
     * @return Product
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

    /**
     * Add images
     *
     * @param LWV\ToolkitBundle\Entity\Product\ProductImage $images
     */
    public function addProductImage(\LWV\ToolkitBundle\Entity\Product\ProductImage $images)
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
     * @param LWV\ToolkitBundle\Entity\Product\ProductCategory $category
     * @return Product
     */
    public function setCategory(\LWV\ToolkitBundle\Entity\Product\ProductCategory $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return LWV\ToolkitBundle\Entity\Product\ProductCategory
     */
    public function getCategory()
    {
        return $this->category;
    }
}