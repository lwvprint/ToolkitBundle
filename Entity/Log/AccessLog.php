<?php

namespace LWV\ToolkitBundle\Entity\Log;

use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\Log\AccessLog
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AccessLog
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
     * @var integer $user_id
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $user_id;

    /**
     * @var string $attempted_username
     *
     * @ORM\Column(name="attempted_username", type="string", length=255)
     */
    private $attempted_username;

    /**
     * @var string $attempted_password
     *
     * @ORM\Column(name="attempted_password", type="string", length=255)
     */
    private $attempted_password;

    /**
     * @var string $ip_address
     *
     * @ORM\Column(name="ip_address", type="string", length=255)
     */
    private $ip_address;

    /**
     * @var string $browser_info
     *
     * @ORM\Column(name="browser_info", type="string", length=255)
     */
    private $browser_info;

    /**
     * @var boolean $logged_in
     *
     * @ORM\Column(name="logged_in", type="boolean")
     */
    private $logged_in;

    /**
     * @var date $created_at
     *
     * @ORM\Column(name="created_at", type="date", length="25")
     */
    private $created_at;

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
     * Set user_id
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    }

    /**
     * Get user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set attempted_username
     *
     * @param string $attemptedUsername
     */
    public function setAttemptedUsername($attemptedUsername)
    {
        $this->attempted_username = $attemptedUsername;
    }

    /**
     * Get attempted_username
     *
     * @return string
     */
    public function getAttemptedUsername()
    {
        return $this->attempted_username;
    }

    /**
     * Set attempted_password
     *
     * @param string $attemptedPassword
     */
    public function setAttemptedPassword($attemptedPassword)
    {
        $this->attempted_password = $attemptedPassword;
    }

    /**
     * Get attempted_password
     *
     * @return string
     */
    public function getAttemptedPassword()
    {
        return $this->attempted_password;
    }

    /**
     * Set ip_address
     *
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;
    }

    /**
     * Get ip_address
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set browser_info
     *
     * @param string $browserInfo
     */
    public function setBrowserInfo($browserInfo)
    {
        $this->browser_info = $browserInfo;
    }

    /**
     * Get browser_info
     *
     * @return string
     */
    public function getBrowserInfo()
    {
        return $this->browser_info;
    }

    /**
     * Set logged_in
     *
     * @param boolean $loggedIn
     */
    public function setLoggedIn($loggedIn)
    {
        $this->logged_in = $loggedIn;
    }

    /**
     * Get logged_in
     *
     * @return boolean
     */
    public function getLoggedIn()
    {
        return $this->logged_in;
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
}