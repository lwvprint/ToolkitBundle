<?php

namespace LWV\ToolkitBundle\Entity\User;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\User\Company
 *
 */

 /**
  * @Gedmo\Tree(type="nested")
  * @ORM\Table(name="company")
  * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\User\CompanyRepository")
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
    private $id;

    /**
    * @Gedmo\TreeLeft
    * @ORM\Column(type="integer")
    */
    private $lft;

    /**
    * @Gedmo\TreeRight
    * @ORM\Column(type="integer")
    */
    private $rgt;

    /**
    * @Gedmo\TreeRoot
    * @ORM\Column(type="integer", nullable="true")
    */
    private $root;

    /**
    * @Gedmo\TreeLevel
    * @ORM\Column(type="integer")
    */
    private $lvl;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Company", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    private $children;

    /**
     * @var string $account_no
     *
     * @ORM\Column(name="account_no", type="string", length=25)
     */
    private $account_no;

    /**
     * @var integer $contact_id
     *
     * @ORM\Column(name="contact_id", type="integer")
     */
    private $contact_id;

    /**
     * @var integer $pricing_id
     *
     * @ORM\Column(name="pricing_id", type="integer")
     */
    private $pricing_id;

    /**
     * @var integer $shipping_id
     *
     * @ORM\Column(name="shipping_id", type="integer")
     */
    private $shipping_id;

    /**
     * @var integer $status_group_id
     *
     * @ORM\Column(name="status_group_id", type="integer")
     */
    private $status_group_id;

    /**
     * @var string $address1
     *
     * @ORM\Column(name="address1", type="string", length=255)
     */
    private $address1;

    /**
     * @var string $address2
     *
     * @ORM\Column(name="address2", type="string", length=255)
     */
    private $address2;

    /**
     * @var string $town
     *
     * @ORM\Column(name="town", type="string", length=100)
     */
    private $town;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=100)
     */
    private $city;

    /**
     * @var string $post_code
     *
     * @ORM\Column(name="post_code", type="string", length=8)
     */
    private $post_code;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string $website
     *
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;

    /**
     * @var integer $account_manager_id
     *
     * @ORM\Column(name="account_manager_id", type="integer")
     */
    private $account_manager_id;

    /**
     * @var date $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="date", length="25")
     */
    private $created_at;

    /**
     * @var date $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="date", length="25")
     */
    private $updated_at;


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
     * Set account_no
     *
     * @param string $accountNo
     */
    public function setAccountNo($accountNo)
    {
        $this->account_no = $accountNo;
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
     * Set contact_id
     *
     * @param integer $contactId
     */
    public function setContactId($contactId)
    {
        $this->contact_id = $contactId;
    }

    /**
     * Get contact_id
     *
     * @return integer
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * Set pricing_id
     *
     * @param integer $pricingId
     */
    public function setPricingId($pricingId)
    {
        $this->pricing_id = $pricingId;
    }

    /**
     * Get pricing_id
     *
     * @return integer
     */
    public function getPricingId()
    {
        return $this->pricing_id;
    }

    /**
     * Set shipping_id
     *
     * @param integer $shippingId
     */
    public function setShippingId($shippingId)
    {
        $this->shipping_id = $shippingId;
    }

    /**
     * Get shipping_id
     *
     * @return integer
     */
    public function getShippingId()
    {
        return $this->shipping_id;
    }

    /**
     * Set status_group_id
     *
     * @param integer $statusGroupId
     */
    public function setStatusGroupId($statusGroupId)
    {
        $this->status_group_id = $statusGroupId;
    }

    /**
     * Get status_group_id
     *
     * @return integer
     */
    public function getStatusGroupId()
    {
        return $this->status_group_id;
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
     * Set town
     *
     * @param string $town
     */
    public function setTown($town)
    {
        $this->town = $town;
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
     * Set post_code
     *
     * @param string $postCode
     */
    public function setPostCode($postCode)
    {
        $this->post_code = $postCode;
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
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     */
    public function setWebsite($website)
    {
        $this->website = $website;
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
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
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
     * Set account_manager_id
     *
     * @param integer $accountManagerId
     */
    public function setAccountManagerId($accountManagerId)
    {
        $this->account_manager_id = $accountManagerId;
    }

    /**
     * Get account_manager_id
     *
     * @return integer
     */
    public function getAccountManagerId()
    {
        return $this->account_manager_id;
    }

    /**
     * Set created_at
     *
     * @param date $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
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
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
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
     * Set lft
     *
     * @param integer $lft
     */
    public function setLft($lft)
    {
        $this->lft = $lft;
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
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;
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
     */
    public function setRoot($root)
    {
        $this->root = $root;
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
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
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
     * Set parent
     *
     * @param LWV\ToolkitBundle\Entity\User\Company $parent
     */
    public function setParent(\LWV\ToolkitBundle\Entity\User\Company $parent)
    {
        $this->parent = $parent;
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
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
}