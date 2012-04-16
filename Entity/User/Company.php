<?php

namespace LWV\ToolkitBundle\Entity\User;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\User\CompanyRepository")
 * @ORM\Table(name="company")
 * @Gedmo\Tree(type="nested")
 */
class Company
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
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="Company", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    protected $children;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var string $account_no
     *
     * @ORM\Column(type="string", length=25)
     */
    protected $account_no;

    /**
     * @var string $address1
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $address1;

    /**
     * @var string $address2
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $address2;

    /**
     * @var string $town
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $town;

    /**
     * @var string $city
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $city;

    /**
     * @var string $post_code
     *
     * @ORM\Column(type="string", length=8)
     */
    protected $post_code;

    /**
     * @var string $email
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $email;

    /**
     * @var string $website
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $website;

    /**
     * @var boolean $is_active
     *
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
     * @ORM\Column(type="datetime", length=25)
     */
    protected $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="company")
     */
    protected $users;

    /**
     * @ORM\OneToMany(targetEntity="LWV\ToolkitBundle\Entity\Order\Order", mappedBy="company")
     */
    protected $orders;

    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Toolkit\Toolkit", inversedBy="company")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    protected $toolkit;

    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lft
     *
     * @param integer $lft
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * Set account_no
     *
     * @param string $accountNo
     * @return Company
     */
    public function setAccountNo($accountNo)
    {
        $this->account_no = $accountNo;
        return $this;
    }

    /**
     * Get account_no
     *
     * @return string 
     */
    public function getAccountNo()
    {
        return $this->account_no;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Company
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
        return $this;
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
     * @return Company
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
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
     * Set town
     *
     * @param string $town
     * @return Company
     */
    public function setTown($town)
    {
        $this->town = $town;
        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
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
     * Set post_code
     *
     * @param string $postCode
     * @return Company
     */
    public function setPostCode($postCode)
    {
        $this->post_code = $postCode;
        return $this;
    }

    /**
     * Get post_code
     *
     * @return string 
     */
    public function getPostCode()
    {
        return $this->post_code;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Company
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Company
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Company
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
     * @return Company
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
     * @return Company
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
     * @param LWV\ToolkitBundle\Entity\User\Company $parent
     * @return Company
     */
    public function setParent(\LWV\ToolkitBundle\Entity\User\Company $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return LWV\ToolkitBundle\Entity\User\Company 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param LWV\ToolkitBundle\Entity\User\Company $children
     */
    public function addCompany(\LWV\ToolkitBundle\Entity\User\Company $children)
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
     * Add users
     *
     * @param LWV\ToolkitBundle\Entity\User\User $users
     */
    public function addUser(\LWV\ToolkitBundle\Entity\User\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
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
     * Set toolkit
     *
     * @param LWV\ToolkitBundle\Entity\Toolkit\Toolkit $toolkit
     * @return Company
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
}