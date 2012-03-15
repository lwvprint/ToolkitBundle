<?php

namespace LWV\ToolkitBundle\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Product\ProductCategoryRepository")
 * @ORM\Table(name="product_category")
 * @Gedmo\Tree(type="nested")
 */
class ProductCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @Gedmo\TreeLeft
    * @ORM\Column(type="integer")
    */
    protected $lft;

    /**
    * @Gedmo\TreeRight
    * @ORM\Column(type="integer")
    */
    protected $rgt;

    /**
    * @Gedmo\TreeRoot
    * @ORM\Column(type="integer", nullable=true)
    */
    protected $root;

    /**
    * @Gedmo\TreeLevel
    * @ORM\Column(type="integer")
    */
    protected $lvl;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="ProductCategory")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="ProductCategory", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    protected $children;

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
     * @ORM\Column(type="string", length=255)
     */
    protected $image;

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
     * @ORM\Column(type="datetime", length=25)
     */
    protected $updated_at;
    
    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Toolkit\Toolkit", inversedBy="categories")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $toolkit;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    protected $products;

    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lft
     *
     * @param integer $lft
     * @return ProductCategory
     */
    public function setLft($lft)
    {
        $this->lft = $lft;
        return $this;
    }

    /**
     * Get lft
     *
     * @return integer 
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     * @return ProductCategory
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;
        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer 
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     * @return ProductCategory
     */
    public function setRoot($root)
    {
        $this->root = $root;
        return $this;
    }

    /**
     * Get root
     *
     * @return integer 
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     * @return ProductCategory
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer 
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ProductCategory
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
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Set image
     *
     * @param string $image
     * @return ProductCategory
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Set parent
     *
     * @param LWV\ToolkitBundle\Entity\Product\ProductCategory $parent
     * @return ProductCategory
     */
    public function setParent(\LWV\ToolkitBundle\Entity\Product\ProductCategory $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return LWV\ToolkitBundle\Entity\Product\ProductCategory 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param LWV\ToolkitBundle\Entity\Product\ProductCategory $children
     */
    public function addProductCategory(\LWV\ToolkitBundle\Entity\Product\ProductCategory $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set toolkit
     *
     * @param LWV\ToolkitBundle\Entity\Toolkit\Toolkit $toolkit
     * @return ProductCategory
     */
    public function setToolkit(\LWV\ToolkitBundle\Entity\Toolkit\Toolkit $toolkit = null)
    {
        $this->toolkit = $toolkit;
        return $this;
    }

    /**
     * Get toolkit
     *
     * @return LWV\ToolkitBundle\Entity\Toolkit\Toolkit 
     */
    public function getToolkit()
    {
        return $this->toolkit;
    }

    /**
     * Add products
     *
     * @param LWV\ToolkitBundle\Entity\Product\Product $products
     */
    public function addProduct(\LWV\ToolkitBundle\Entity\Product\Product $products)
    {
        $this->products[] = $products;
    }

    /**
     * Get products
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}