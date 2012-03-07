<?php

namespace LWV\ToolkitBundle\Entity\Frontend;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="product_category")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Frontend\CategoryRepository")
 */
class Category
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
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
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
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\User\Company", inversedBy="categories")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    protected $products;
    
    /**
     * @var date $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="date", length=25)
     */
    protected $created_at;

    /**
     * @var date $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="date", length=25)
     */
    protected $updated_at;

    public function __construct()
    {
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
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * Add products
     *
     * @param LWV\\ToolkitBundle\Entity\Frontend\Product $products
     */
    public function addProduct(\LWV\ToolkitBundle\Entity\Frontend\Product $products)
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

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
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
     * Set company
     *
     * @param LWV\ToolkitBundle\Entity\User\Company $company
     */
    public function setCompany(\LWV\ToolkitBundle\Entity\User\Company $company)
    {
        $this->company = $company;
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
     * Set lft
     *
     * @param integer $lft
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * Set created_at
     *
     * @param date $createdAt
     * @return Category
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    /**
     * Get created_at
     *
     * @return date 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param date $updatedAt
     * @return Category
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return date 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set parent
     *
     * @param LWV\ToolkitBundle\Entity\Frontend\Category $parent
     * @return Category
     */
    public function setParent(\LWV\ToolkitBundle\Entity\Frontend\Category $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return LWV\ToolkitBundle\Entity\Frontend\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param LWV\ToolkitBundle\Entity\Frontend\Company $children
     */
    public function addCompany(\LWV\ToolkitBundle\Entity\Frontend\Company $children)
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
     * Add children
     *
     * @param LWV\ToolkitBundle\Entity\Frontend\Category $children
     */
    public function addCategory(\LWV\ToolkitBundle\Entity\Frontend\Category $children)
    {
        $this->children[] = $children;
    }
}