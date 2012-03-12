<?php

namespace LWV\ToolkitBundle\Entity\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\Order\Item
 *
 * @ORM\Table(name="order_item")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Order\ItemRepository")
 */
class Item
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
     * @var integer $parent_id
     */
    private $parent_id;

    /**
     * @var integer $quote_item_id
     */
    private $quote_item_id;

    /**
     * @var datetime $created_at
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     */
    private $updated_at;

    /**
     * @var integer $product_id
     */
    private $product_id;

    /**
     * @var integer $product_type_id
     */
    private $product_type_id;

    /**
     * @var string $product_options
     */
    private $product_options;

    /**
     * @var text $item_amendments
     */
    private $item_amendments;

    /**
     * @var boolean $is_virtual
     */
    private $is_virtual;

    /**
     * @var string $sku
     */
    private $sku;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var string $additional_notes
     */
    private $additional_notes;

    /**
     * @var boolean $free_shipping
     */
    private $free_shipping;

    /**
     * @var boolean $no_discount
     */
    private $no_discount;

    /**
     * @var string $cost
     */
    private $cost;

    /**
     * @var string $price
     */
    private $price;

    /**
     * @var string $base_price
     */
    private $base_price;

    /**
     * @var string $original_price
     */
    private $original_price;

    /**
     * @var string $base_original_price
     */
    private $base_original_price;

    /**
     * @var string $tax_percent
     */
    private $tax_percent;

    /**
     * @var string $tax_amount
     */
    private $tax_amount;

    /**
     * @var string $base_tax_amount
     */
    private $base_tax_amount;

    /**
     * @var string $tax_invoiced
     */
    private $tax_invoiced;

    /**
     * @var decimal $base_tax_invoiced
     */
    private $base_tax_invoiced;

    /**
     * @var decimal $discount_percent
     */
    private $discount_percent;

    /**
     * @var decimal $discount_amount
     */
    private $discount_amount;

    /**
     * @var decimal $base_discount_amount
     */
    private $base_discount_amount;

    /**
     * @var string $amount_refunded
     */
    private $amount_refunded;

    /**
     * @var decimal $base_amount_refunded
     */
    private $base_amount_refunded;

    /**
     * @var integer $ext_order_item_id
     */
    private $ext_order_item_id;

    /**
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="order_items")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $order;


    /**
     * Set order
     *
     * @param LWV\ToolkitBundle\Entity\Order\Order $order
     * @return Item
     */
    public function setOrder(\LWV\ToolkitBundle\Entity\Order\Order $order = null)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get order
     *
     * @return LWV\ToolkitBundle\Entity\Order\Order
     */
    public function getOrder()
    {
        return $this->order;
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
}