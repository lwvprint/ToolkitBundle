<?php

namespace LWV\ToolkitBundle\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\User\Division
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\User\DivisionRepository")
 */
class Division
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $company_id
     *
     * @ORM\Column(name="company_id", type="integer")
     */
    private $company_id;

    /**
     * @var integer $manager_id
     *
     * @ORM\Column(name="manager_id", type="integer")
     */
    private $manager_id;

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
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;

    /**
     * @var boolean $budget_active
     *
     * @ORM\Column(name="budget_active", type="boolean")
     */
    private $budget_active;

    /**
     * @var integer $budget
     *
     * @ORM\Column(name="budget", type="float")
     */
    private $budget;

    /**
     * @var boolean $password_change_active
     *
     * @ORM\Column(name="password_change_active", type="boolean")
     */
    private $password_change_active;

    /**
     * @var boolean $profile_edit_active
     *
     * @ORM\Column(name="profile_edit_active", type="boolean")
     */
    private $profile_edit_active;

    /**
     * @var integer $theme_id
     *
     * @ORM\Column(name="theme_id", type="integer")
     */
    private $theme_id;

    /**
     * @var integer $account_manager_id
     *
     * @ORM\Column(name="account_manager_id", type="integer")
     */
    private $account_manager_id;

    /**
     * @var date $created_at
     *
     * @ORM\Column(name="created_at", type="date", length="25")
     */
    private $created_at;

    /**
     * @var date $updated_at
     *
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
     * Set company_id
     *
     * @param integer $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->company_id = $companyId;
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
     * Set manager_id
     *
     * @param integer $managerId
     */
    public function setManagerId($managerId)
    {
        $this->manager_id = $managerId;
    }

    /**
     * Get manager_id
     *
     * @return integer
     */
    public function getManagerId()
    {
        return $this->manager_id;
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
     * Set budget_active
     *
     * @param boolean $budgetActive
     */
    public function setBudgetActive($budgetActive)
    {
        $this->budget_active = $budgetActive;
    }

    /**
     * Get budget_active
     *
     * @return boolean
     */
    public function getBudgetActive()
    {
        return $this->budget_active;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * Get budget
     *
     * @return integer
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set password_change_active
     *
     * @param boolean $passwordChangeActive
     */
    public function setPasswordChangeActive($passwordChangeActive)
    {
        $this->password_change_active = $passwordChangeActive;
    }

    /**
     * Get password_change_active
     *
     * @return boolean
     */
    public function getPasswordChangeActive()
    {
        return $this->password_change_active;
    }

    /**
     * Set profile_edit_active
     *
     * @param boolean $profileEditActive
     */
    public function setProfileEditActive($profileEditActive)
    {
        $this->profile_edit_active = $profileEditActive;
    }

    /**
     * Get profile_edit_active
     *
     * @return boolean
     */
    public function getProfileEditActive()
    {
        return $this->profile_edit_active;
    }

    /**
     * Set theme_id
     *
     * @param integer $themeId
     */
    public function setThemeId($themeId)
    {
        $this->theme_id = $themeId;
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
}