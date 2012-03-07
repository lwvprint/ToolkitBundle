<?php

namespace LWV\ToolkitBundle\Entity\Frontend;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_image")
 */
class ProductImage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $image;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="images")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

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
     * Set product
     *
     * @param LWV\ToolkitBundle\Entity\Frontend\Product $product
     */
    public function setProduct(\LWV\ToolkitBundle\Entity\Frontend\Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get product
     *
     * @return LWV\ToolkitBundle\Entity\Frontend\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}