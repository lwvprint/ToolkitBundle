<?php

namespace LWV\ToolkitBundle\Entity\Event;

use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\Event\Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Event\EventRepository")
 */
class Event
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     * @var string $slug
     *  
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var datetime $start
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var datetime $end
     *
     * @ORM\Column(name="end", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string $colour
     *
     * @ORM\Column(name="colour", type="string", length=255)
     */
    private $colour;

    /**
     * @var string $bgColour
     *
     * @ORM\Column(name="bgColour", type="string", length=255)
     */
    private $bgColour;

    /**
     * @var string $textColour
     *
     * @ORM\Column(name="textColour", type="string", length=255)
     */
    private $textColour;

    /**
     * @var string $borderColour
     *
     * @ORM\Column(name="borderColour", type="string", length=255)
     */
    private $borderColour;

    /**
     * @var string $allDay
     *
     * @ORM\Column(name="allDay", type="string", length=255)
     */
    private $allDay;

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
     * Set title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Event
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
     * @return Event
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
     * Set start
     *
     * @param datetime $start
     * @return Event
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * Get start
     *
     * @return datetime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param datetime $end
     * @return Event
     */
    public function setEnd($end)
    {
        $this->end = $end;
        return $this;
    }

    /**
     * Get end
     *
     * @return datetime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Event
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
     * Set url
     *
     * @param string $url
     * @return Event
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
     * Set colour
     *
     * @param string $colour
     * @return Event
     */
    public function setColour($colour)
    {
        $this->colour = $colour;
        return $this;
    }

    /**
     * Get colour
     *
     * @return string 
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * Set bgColour
     *
     * @param string $bgColour
     * @return Event
     */
    public function setBgColour($bgColour)
    {
        $this->bgColour = $bgColour;
        return $this;
    }

    /**
     * Get bgColour
     *
     * @return string 
     */
    public function getBgColour()
    {
        return $this->bgColour;
    }

    /**
     * Set textColour
     *
     * @param string $textColour
     * @return Event
     */
    public function setTextColour($textColour)
    {
        $this->textColour = $textColour;
        return $this;
    }

    /**
     * Get textColour
     *
     * @return string 
     */
    public function getTextColour()
    {
        return $this->textColour;
    }

    /**
     * Set borderColour
     *
     * @param string $borderColour
     * @return Event
     */
    public function setBorderColour($borderColour)
    {
        $this->borderColour = $borderColour;
        return $this;
    }

    /**
     * Get borderColour
     *
     * @return string 
     */
    public function getBorderColour()
    {
        return $this->borderColour;
    }

    /**
     * Set allDay
     *
     * @param string $allDay
     * @return Event
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
        return $this;
    }

    /**
     * Get allDay
     *
     * @return string 
     */
    public function getAllDay()
    {
        return $this->allDay;
    }
}