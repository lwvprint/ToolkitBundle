<?php

namespace LWV\ToolkitBundle\Entity\Toolkit;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\Toolkit\Toolkit
 *
 * @ORM\Table(name="toolkit")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Toolkit\ToolkitRepository")
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
    private $id;
    
    /**
     * @var integer $company_id
     *
     * @ORM\Column(name="company_id", type="integer")
     */
    private $company_id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;

    /**
     * @var boolean $is_demo
     *
     * @ORM\Column(name="is_demo", type="boolean")
     */
    private $is_demo;

    /**
     * @var boolean $is_secure
     *
     * @ORM\Column(name="is_secure", type="boolean")
     */
    private $is_secure;

    /**
     * @var boolean $is_payment
     *
     * @ORM\Column(name="is_payment", type="boolean")
     */
    private $is_payment;

    /**
     * @var boolean $maintenance_mode
     *
     * @ORM\Column(name="maintenance_mode", type="boolean")
     */
    private $maintenance_mode;

    /**
     * @var string $maintenance_message
     *
     * @ORM\Column(name="maintenance_message", type="string", length=255, nullable=true)
     */
    private $maintenance_message;

    /**
     * @var integer $status_id
     *
     * @ORM\Column(name="status_id", type="integer")
     */
    private $status_id;

    /**
     * @var integer $pricing_id
     *
     * @ORM\Column(name="pricing_id", type="integer")
     */
    private $pricing_id;

    /**
     * @var integer $delivery_id
     *
     * @ORM\Column(name="delivery_id", type="integer")
     */
    private $delivery_id;

    /**
     * @var integer $theme_id
     *
     * @ORM\Column(name="theme_id", type="integer")
     */
    private $theme_id;

    /**
     * @var boolean $can_edit_profile
     *
     * @ORM\Column(name="can_edit_profile", type="boolean")
     */
    private $can_edit_profile;

    /**
     * @var boolean $can_edit_password
     *
     * @ORM\Column(name="can_edit_password", type="boolean")
     */
    private $can_edit_password;

    /**
     * @var boolean $enable_budget
     *
     * @ORM\Column(name="enable_budget", type="boolean")
     */
    private $enable_budget;

    /**
     * @var decimal $budget
     *
     * @ORM\Column(name="budget", type="decimal", nullable=true)
     */
    private $budget;

    /**
     * @var integer $staff_operator_id
     *
     * @ORM\Column(name="staff_operator_id", type="integer", nullable=true)
     */
    private $staff_operator_id;

    /**
     * @var integer $company_operator_id
     *
     * @ORM\Column(name="company_operator_id", type="integer", nullable=true)
     */
    private $company_operator_id;

    /**
     * @ORM\OneToMany(targetEntity="LWV\ToolkitBundle\Entity\Frontend\Category", mappedBy="toolkit")
     */
    private $categories;
    
    
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set company_id
     *
     * @param integer $companyId
     * @return Toolkit
     */
    public function setCompanyId($companyId)
    {
        $this->company_id = $companyId;
        return $this;
    }

    /**
     * Get company_id
     *
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->company_id;
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
     * Set status_id
     *
     * @param integer $statusId
     * @return Toolkit
     */
    public function setStatusId($statusId)
    {
        $this->status_id = $statusId;
        return $this;
    }

    /**
     * Get status_id
     *
     * @return integer 
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * Set pricing_id
     *
     * @param integer $pricingId
     * @return Toolkit
     */
    public function setPricingId($pricingId)
    {
        $this->pricing_id = $pricingId;
        return $this;
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
     * Set delivery_id
     *
     * @param integer $deliveryId
     * @return Toolkit
     */
    public function setDeliveryId($deliveryId)
    {
        $this->delivery_id = $deliveryId;
        return $this;
    }

    /**
     * Get delivery_id
     *
     * @return integer 
     */
    public function getDeliveryId()
    {
        return $this->delivery_id;
    }

    /**
     * Set theme_id
     *
     * @param integer $themeId
     * @return Toolkit
     */
    public function setThemeId($themeId)
    {
        $this->theme_id = $themeId;
        return $this;
    }

    /**
     * Get theme_id
     *
     * @return integer 
     */
    public function getThemeId()
    {
        return $this->theme_id;
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
     * Set budget
     *
     * @param decimal $budget
     * @return Toolkit
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
        return $this;
    }

    /**
     * Get budget
     *
     * @return decimal 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set staff_operator_id
     *
     * @param integer $staffOperatorId
     * @return Toolkit
     */
    public function setStaffOperatorId($staffOperatorId)
    {
        $this->staff_operator_id = $staffOperatorId;
        return $this;
    }

    /**
     * Get staff_operator_id
     *
     * @return integer 
     */
    public function getStaffOperatorId()
    {
        return $this->staff_operator_id;
    }

    /**
     * Set company_operator_id
     *
     * @param integer $companyOperatorId
     * @return Toolkit
     */
    public function setCompanyOperatorId($companyOperatorId)
    {
        $this->company_operator_id = $companyOperatorId;
        return $this;
    }

    /**
     * Get company_operator_id
     *
     * @return integer 
     */
    public function getCompanyOperatorId()
    {
        return $this->company_operator_id;
    }

    /**
     * Add categories
     *
     * @param LWV\ToolkitBundle\Entity\Frontend\Category $categories
     */
    public function addCategory(\LWV\ToolkitBundle\Entity\Frontend\Category $categories)
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
}