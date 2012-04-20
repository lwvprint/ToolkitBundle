<?php

namespace LWV\ToolkitBundle\Entity\Toolkit;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Toolkit\ToolkitRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="toolkit")
 */
class Toolkit
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
     * @var string $name
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $name;
    
    /**
     * @var string $slug 
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $slug;

    /**
     * @var string $url
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $url;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(type="boolean")
     */
    protected $is_active;

    /**
     * @var boolean $is_demo
     *
     * @ORM\Column(type="boolean")
     */
    protected $is_demo;

    /**
     * @var boolean $is_secure
     *
     * @ORM\Column(type="boolean")
     */
    protected $is_secure;

    /**
     * @var boolean $is_payment
     *
     * @ORM\Column(type="boolean")
     */
    protected $is_payment;

    /**
     * @var boolean $maintenance_mode
     *
     * @ORM\Column(type="boolean")
     */
    protected $maintenance_mode;

    /**
     * @var string $maintenance_message
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $maintenance_message;

    /**
     * @var boolean $can_edit_profile
     *
     * @ORM\Column(type="boolean")
     */
    protected $can_edit_profile;

    /**
     * @var boolean $can_edit_password
     *
     * @ORM\Column(type="boolean")
     */
    protected $can_edit_password;

    /**
     * @var boolean $enable_budget
     *
     * @ORM\Column(type="boolean")
     */
    protected $enable_budget;

    /**
     * @var decimal $budget_amount
     *
     * @ORM\Column(type="decimal", precision=2, nullable=true)
     */
    protected $budget_amount;
    
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
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Status\Status")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $status_group;

    /**
     * ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Pricing\PricingGroup")
     * ORM\JoinColumn(referencedColumnName="id")
    protected $pricing_group;
     */

    /**
     * ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Shipping\ShippingGroup")
     * ORM\JoinColumn(referencedColumnName="id")
    protected $shipping_group;
     */

    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Theme\Theme")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $theme;
    
    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\User\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $staff_operator;

    /**
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\User\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $company_operator;

    /**
     * @ORM\OneToMany(targetEntity="LWV\ToolkitBundle\Entity\Product\ProductCategory", mappedBy="toolkit")
     */
    protected $categories;
    
    /**
     * @ORM\OneToMany(targetEntity="LWV\ToolkitBundle\Entity\User\Company", mappedBy="toolkit")
     */
    protected $companies;
    
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->companies = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Toolkit
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
     * Set url
     *
     * @param string $url
     * @return Toolkit
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Toolkit
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
     * Set is_demo
     *
     * @param boolean $isDemo
     * @return Toolkit
     */
    public function setIsDemo($isDemo)
    {
        $this->is_demo = $isDemo;
        return $this;
    }

    /**
     * Get is_demo
     *
     * @return boolean 
     */
    public function getIsDemo()
    {
        return $this->is_demo;
    }

    /**
     * Set is_secure
     *
     * @param boolean $isSecure
     * @return Toolkit
     */
    public function setIsSecure($isSecure)
    {
        $this->is_secure = $isSecure;
        return $this;
    }

    /**
     * Get is_secure
     *
     * @return boolean 
     */
    public function getIsSecure()
    {
        return $this->is_secure;
    }

    /**
     * Set is_payment
     *
     * @param boolean $isPayment
     * @return Toolkit
     */
    public function setIsPayment($isPayment)
    {
        $this->is_payment = $isPayment;
        return $this;
    }

    /**
     * Get is_payment
     *
     * @return boolean 
     */
    public function getIsPayment()
    {
        return $this->is_payment;
    }

    /**
     * Set maintenance_mode
     *
     * @param boolean $maintenanceMode
     * @return Toolkit
     */
    public function setMaintenanceMode($maintenanceMode)
    {
        $this->maintenance_mode = $maintenanceMode;
        return $this;
    }

    /**
     * Get maintenance_mode
     *
     * @return boolean 
     */
    public function getMaintenanceMode()
    {
        return $this->maintenance_mode;
    }

    /**
     * Set maintenance_message
     *
     * @param string $maintenanceMessage
     * @return Toolkit
     */
    public function setMaintenanceMessage($maintenanceMessage)
    {
        $this->maintenance_message = $maintenanceMessage;
        return $this;
    }

    /**
     * Get maintenance_message
     *
     * @return string 
     */
    public function getMaintenanceMessage()
    {
        return $this->maintenance_message;
    }

    /**
     * Set can_edit_profile
     *
     * @param boolean $canEditProfile
     * @return Toolkit
     */
    public function setCanEditProfile($canEditProfile)
    {
        $this->can_edit_profile = $canEditProfile;
        return $this;
    }

    /**
     * Get can_edit_profile
     *
     * @return boolean 
     */
    public function getCanEditProfile()
    {
        return $this->can_edit_profile;
    }

    /**
     * Set can_edit_password
     *
     * @param boolean $canEditPassword
     * @return Toolkit
     */
    public function setCanEditPassword($canEditPassword)
    {
        $this->can_edit_password = $canEditPassword;
        return $this;
    }

    /**
     * Get can_edit_password
     *
     * @return boolean 
     */
    public function getCanEditPassword()
    {
        return $this->can_edit_password;
    }

    /**
     * Set enable_budget
     *
     * @param boolean $enableBudget
     * @return Toolkit
     */
    public function setEnableBudget($enableBudget)
    {
        $this->enable_budget = $enableBudget;
        return $this;
    }

    /**
     * Get enable_budget
     *
     * @return boolean 
     */
    public function getEnableBudget()
    {
        return $this->enable_budget;
    }

    /**
     * Set budget_amount
     *
     * @param decimal $budgetAmount
     * @return Toolkit
     */
    public function setBudgetAmount($budgetAmount)
    {
        $this->budget_amount = $budgetAmount;
        return $this;
    }

    /**
     * Get budget_amount
     *
     * @return decimal 
     */
    public function getBudgetAmount()
    {
        return $this->budget_amount;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Toolkit
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
     * @return Toolkit
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
     * Set status_group
     *
     * @param LWV\ToolkitBundle\Entity\Status\Status $statusGroup
     * @return Toolkit
     */
    public function setStatusGroup(\LWV\ToolkitBundle\Entity\Status\Status $statusGroup = null)
    {
        $this->status_group = $statusGroup;
        return $this;
    }

    /**
     * Get status_group
     *
     * @return LWV\ToolkitBundle\Entity\Status\Status 
     */
    public function getStatusGroup()
    {
        return $this->status_group;
    }

    /**
     * Set theme
     *
     * @param LWV\ToolkitBundle\Entity\Theme\Theme $theme
     * @return Toolkit
     */
    public function setTheme(\LWV\ToolkitBundle\Entity\Theme\Theme $theme = null)
    {
        $this->theme = $theme;
        return $this;
    }

    /**
     * Get theme
     *
     * @return LWV\ToolkitBundle\Entity\Theme\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set staff_operator
     *
     * @param LWV\ToolkitBundle\Entity\User\User $staffOperator
     * @return Toolkit
     */
    public function setStaffOperator(\LWV\ToolkitBundle\Entity\User\User $staffOperator = null)
    {
        $this->staff_operator = $staffOperator;
        return $this;
    }

    /**
     * Get staff_operator
     *
     * @return LWV\ToolkitBundle\Entity\User\User 
     */
    public function getStaffOperator()
    {
        return $this->staff_operator;
    }

    /**
     * Set company_operator
     *
     * @param LWV\ToolkitBundle\Entity\User\User $companyOperator
     * @return Toolkit
     */
    public function setCompanyOperator(\LWV\ToolkitBundle\Entity\User\User $companyOperator = null)
    {
        $this->company_operator = $companyOperator;
        return $this;
    }

    /**
     * Get company_operator
     *
     * @return LWV\ToolkitBundle\Entity\User\User 
     */
    public function getCompanyOperator()
    {
        return $this->company_operator;
    }

    /**
     * Add categories
     *
     * @param LWV\ToolkitBundle\Entity\Product\ProductCategory $categories
     */
    public function addProductCategory(\LWV\ToolkitBundle\Entity\Product\ProductCategory $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add companies
     *
     * @param LWV\ToolkitBundle\Entity\User\Company $companies
     */
    public function addCompany(\LWV\ToolkitBundle\Entity\User\Company $companies)
    {
        $this->companies[] = $companies;
    }

    /**
     * Get companies
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Toolkit
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
}