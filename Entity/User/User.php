<?php

namespace LWV\ToolkitBundle\Entity\User;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\User\User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\User\UserRepository")
 */
class User implements AdvancedUserInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     */
    protected $username;

    /**
     * @ORM\Column(name="salt", type="string", length=40)
     */
    protected $salt;

    /**
     * @ORM\Column(name="password", type="string", length=40)
     */
    protected $password;

    /**
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive;
    
    /**
     * @ORM\Column(name="reset_token", type="string", length=200)
     */
    protected $resetToken;
    
    /**
     * @ORM\Column(name="reset_token_date", type="datetime", length=25, nullable=true)
     */
    protected $resetTokenDate;

    /**
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     *
     */
    protected $groups;

    /**
     * @ORM\OneToOne(targetEntity="Profile", inversedBy="user")
     */
    protected $profile;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="users")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;

    public function __construct()
    {
        $this->isActive = true;
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->groups = new ArrayCollection();
    }

    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return $this->groups->toArray();
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add groups
     *
     * @param LWV\ToolkitBundle\Entity\User\Group $groups
     */
    public function addGroup(\LWV\ToolkitBundle\Entity\User\Group $groups)
    {
        $this->groups[] = $groups;
    }

    /**
     * Get groups
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set profile
     *
     * @param LWV\ToolkitBundle\Entity\User\Profile $profile
     */
    public function setProfile(\LWV\ToolkitBundle\Entity\User\Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get profile
     *
     * @return LWV\ToolkitBundle\Entity\User\Profile
     */
    public function getProfile()
    {
        return $this->profile;
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
     * Set resetToken
     *
     * @param string $resetToken
     * @return User
     */
    public function setResetToken($resetToken)
    {
        $this->resetToken = $resetToken;
        return $this;
    }

    /**
     * Get resetToken
     *
     * @return string 
     */
    public function getResetToken()
    {
        return $this->resetToken;
    }

    /**
     * Set resetTokenDate
     *
     * @param datetime $resetTokenDate
     * @return User
     */
    public function setResetTokenDate($resetTokenDate)
    {
        $this->resetTokenDate = $resetTokenDate;
        return $this;
    }

    /**
     * Get resetTokenDate
     *
     * @return datetime 
     */
    public function getResetTokenDate()
    {
        return $this->resetTokenDate;
    }
}