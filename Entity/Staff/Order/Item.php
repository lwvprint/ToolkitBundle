<?php

namespace LWV\ToolkitBundle\Entity\Staff\Order;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\Staff\Order\Item
 *
 * @ORM\Table(name="order_item")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Staff\Order\ItemRepository")
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
     *
     * @ORM\ManyToOne(targetEntity="LWV\ToolkitBundle\Entity\Staff\Order", inversedBy="items")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $orders;

    /**
     * @var integer $parent_id
     *
     * @ORM\Column(name="parent_id", type="integer")
     */
    private $parent_id;

    /**
     * @var integer $quote_item_id
     *
     * @ORM\Column(name="quote_item_id", type="integer")
     */
    private $quote_item_id;

    /**
     * @var datetime $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", length=25)
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", length=25)
     */
    private $updated_at;

    /**
     * @var integer $product_id
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $product_id;

    /**
     * @var integer $product_type_id
     *
     * @ORM\Column(name="product_type_id", type="integer")
     */
    private $product_type_id;

    /**
     * @var string $product_options
     *
     * @ORM\Column(name="product_options", type="string", length=255)
     */
    private $product_options;

    /**
     * @var text $item_amendments
     *
     * @ORM\Column(name="item_amendments", type="text")
     */
    private $item_amendments;

    /**
     * @var boolean $is_virtual
     *
     * @ORM\Column(name="is_virtual", type="boolean")
     */
    private $is_virtual;

    /**
     * @var string $sku
     *
     * @ORM\Column(name="sku", type="string", length=100)
     */
    private $sku;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string $additional_notes
     *
     * @ORM\Column(name="additional_notes", type="string", length=255)
     */
    private $additional_notes;

    /**
     * @var boolean $free_shipping
     *
     * @ORM\Column(name="free_shipping", type="boolean")
     */
    private $free_shipping;

    /**
     * @var boolean $no_discount
     *
     * @ORM\Column(name="no_discount", type="boolean")
     */
    private $no_discount;

    /**
     * @var string $cost
     *
     * @ORM\Column(name="cost", type="string", length=255)
     */
    private $cost;

    /**
     * @var string $price
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var string $base_price
     *
     * @ORM\Column(name="base_price", type="string", length=255)
     */
    private $base_price;

    /**
     * @var string $original_price
     *
     * @ORM\Column(name="original_price", type="string", length=255)
     */
    private $original_price;

    /**
     * @var string $base_original_price
     *
     * @ORM\Column(name="base_original_price", type="string", length=255)
     */
    private $base_original_price;

    /**
     * @var string $tax_percent
     *
     * @ORM\Column(name="tax_percent", type="string", length=255)
     */
    private $tax_percent;

    /**
     * @var string $tax_amount
     *
     * @ORM\Column(name="tax_amount", type="string", length=255)
     */
    private $tax_amount;

    /**
     * @var string $base_tax_amount
     *
     * @ORM\Column(name="base_tax_amount", type="string", length=255)
     */
    private $base_tax_amount;

    /**
     * @var string $tax_invoiced
     *
     * @ORM\Column(name="tax_invoiced", type="string", length=255)
     */
    private $tax_invoiced;

    /**
     * @var decimal $base_tax_invoiced
     *
     * @ORM\Column(name="base_tax_invoiced", type="decimal")
     */
    private $base_tax_invoiced;

    /**
     * @var decimal $discount_percent
     *
     * @ORM\Column(name="discount_percent", type="decimal")
     */
    private $discount_percent;

    /**
     * @var decimal $discount_amount
     *
     * @ORM\Column(name="discount_amount", type="decimal")
     */
    private $discount_amount;

    /**
     * @var decimal $base_discount_amount
     *
     * @ORM\Column(name="base_discount_amount", type="decimal")
     */
    private $base_discount_amount;

    /**
     * @var string $amount_refunded
     *
     * @ORM\Column(name="amount_refunded", type="string", length=255)
     */
    private $amount_refunded;

    /**
     * @var decimal $base_amount_refunded
     *
     * @ORM\Column(name="base_amount_refunded", type="decimal")
     */
    private $base_amount_refunded;

    /**
     * @var integer $ext_order_item_id
     *
     * @ORM\Column(name="ext_order_item_id", type="integer")
     */
    private $ext_order_item_id;


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
     * Set parent_id
     *
     * @param integer $parentId
     * @return Item
     */
    public function setParentId($parentId)
    {
        $this->parent_id = $parentId;
        return $this;
    }

    /**
     * Get parent_id
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Set quote_item_id
     *
     * @param integer $quoteItemId
     * @return Item
     */
    public function setQuoteItemId($quoteItemId)
    {
        $this->quote_item_id = $quoteItemId;
        return $this;
    }

    /**
     * Get quote_item_id
     *
     * @return integer
     */
    public function getQuoteItemId()
    {
        return $this->quote_item_id;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Item
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
     * @return Item
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
     * Set product_id
     *
     * @param integer $productId
     * @return Item
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;
        return $this;
    }

    /**
     * Get product_id
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set product_type_id
     *
     * @param integer $productTypeId
     * @return Item
     */
    public function setProductTypeId($productTypeId)
    {
        $this->product_type_id = $productTypeId;
        return $this;
    }

    /**
     * Get product_type_id
     *
     * @return integer
     */
    public function getProductTypeId()
    {
        return $this->product_type_id;
    }

    /**
     * Set product_options
     *
     * @param string $productOptions
     * @return Item
     */
    public function setProductOptions($productOptions)
    {
        $this->product_options = $productOptions;
        return $this;
    }

    /**
     * Get product_options
     *
     * @return string
     */
    public function getProductOptions()
    {
        return $this->product_options;
    }

    /**
     * Set item_amendments
     *
     * @param text $itemAmendments
     * @return Item
     */
    public function setItemAmendments($itemAmendments)
    {
        $this->item_amendments = $itemAmendments;
        return $this;
    }

    /**
     * Get item_amendments
     *
     * @return text
     */
    public function getItemAmendments()
    {
        return $this->item_amendments;
    }

    /**
     * Set is_virtual
     *
     * @param boolean $isVirtual
     * @return Item
     */
    public function setIsVirtual($isVirtual)
    {
        $this->is_virtual = $isVirtual;
        return $this;
    }

    /**
     * Get is_virtual
     *
     * @return boolean
     */
    public function getIsVirtual()
    {
        return $this->is_virtual;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return Item
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Get sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Item
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
     * Set description
     *
     * @param string $description
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set additional_notes
     *
     * @param string $additionalNotes
     * @return Item
     */
    public function setAdditionalNotes($additionalNotes)
    {
        $this->additional_notes = $additionalNotes;
        return $this;
    }

    /**
     * Get additional_notes
     *
     * @return string
     */
    public function getAdditionalNotes()
    {
        return $this->additional_notes;
    }

    /**
     * Set free_shipping
     *
     * @param boolean $freeShipping
     * @return Item
     */
    public function setFreeShipping($freeShipping)
    {
        $this->free_shipping = $freeShipping;
        return $this;
    }

    /**
     * Get free_shipping
     *
     * @return boolean
     */
    public function getFreeShipping()
    {
        return $this->free_shipping;
    }

    /**
     * Set no_discount
     *
     * @param boolean $noDiscount
     * @return Item
     */
    public function setNoDiscount($noDiscount)
    {
        $this->no_discount = $noDiscount;
        return $this;
    }

    /**
     * Get no_discount
     *
     * @return boolean
     */
    public function getNoDiscount()
    {
        return $this->no_discount;
    }

    /**
     * Set cost
     *
     * @param string $cost
     * @return Item
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set base_price
     *
     * @param string $basePrice
     * @return Item
     */
    public function setBasePrice($basePrice)
    {
        $this->base_price = $basePrice;
        return $this;
    }

    /**
     * Get base_price
     *
     * @return string
     */
    public function getBasePrice()
    {
        return $this->base_price;
    }

    /**
     * Set original_price
     *
     * @param string $originalPrice
     * @return Item
     */
    public function setOriginalPrice($originalPrice)
    {
        $this->original_price = $originalPrice;
        return $this;
    }

    /**
     * Get original_price
     *
     * @return string
     */
    public function getOriginalPrice()
    {
        return $this->original_price;
    }

    /**
     * Set base_original_price
     *
     * @param string $baseOriginalPrice
     * @return Item
     */
    public function setBaseOriginalPrice($baseOriginalPrice)
    {
        $this->base_original_price = $baseOriginalPrice;
        return $this;
    }

    /**
     * Get base_original_price
     *
     * @return string
     */
    public function getBaseOriginalPrice()
    {
        return $this->base_original_price;
    }

    /**
     * Set tax_percent
     *
     * @param string $taxPercent
     * @return Item
     */
    public function setTaxPercent($taxPercent)
    {
        $this->tax_percent = $taxPercent;
        return $this;
    }

    /**
     * Get tax_percent
     *
     * @return string
     */
    public function getTaxPercent()
    {
        return $this->tax_percent;
    }

    /**
     * Set tax_amount
     *
     * @param string $taxAmount
     * @return Item
     */
    public function setTaxAmount($taxAmount)
    {
        $this->tax_amount = $taxAmount;
        return $this;
    }

    /**
     * Get tax_amount
     *
     * @return string
     */
    public function getTaxAmount()
    {
        return $this->tax_amount;
    }

    /**
     * Set base_tax_amount
     *
     * @param string $baseTaxAmount
     * @return Item
     */
    public function setBaseTaxAmount($baseTaxAmount)
    {
        $this->base_tax_amount = $baseTaxAmount;
        return $this;
    }

    /**
     * Get base_tax_amount
     *
     * @return string
     */
    public function getBaseTaxAmount()
    {
        return $this->base_tax_amount;
    }

    /**
     * Set tax_invoiced
     *
     * @param string $taxInvoiced
     * @return Item
     */
    public function setTaxInvoiced($taxInvoiced)
    {
        $this->tax_invoiced = $taxInvoiced;
        return $this;
    }

    /**
     * Get tax_invoiced
     *
     * @return string
     */
    public function getTaxInvoiced()
    {
        return $this->tax_invoiced;
    }

    /**
     * Set base_tax_invoiced
     *
     * @param decimal $baseTaxInvoiced
     * @return Item
     */
    public function setBaseTaxInvoiced($baseTaxInvoiced)
    {
        $this->base_tax_invoiced = $baseTaxInvoiced;
        return $this;
    }

    /**
     * Get base_tax_invoiced
     *
     * @return decimal
     */
    public function getBaseTaxInvoiced()
    {
        return $this->base_tax_invoiced;
    }

    /**
     * Set discount_percent
     *
     * @param decimal $discountPercent
     * @return Item
     */
    public function setDiscountPercent($discountPercent)
    {
        $this->discount_percent = $discountPercent;
        return $this;
    }

    /**
     * Get discount_percent
     *
     * @return decimal
     */
    public function getDiscountPercent()
    {
        return $this->discount_percent;
    }

    /**
     * Set discount_amount
     *
     * @param decimal $discountAmount
     * @return Item
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discount_amount = $discountAmount;
        return $this;
    }

    /**
     * Get discount_amount
     *
     * @return decimal
     */
    public function getDiscountAmount()
    {
        return $this->discount_amount;
    }

    /**
     * Set base_discount_amount
     *
     * @param decimal $baseDiscountAmount
     * @return Item
     */
    public function setBaseDiscountAmount($baseDiscountAmount)
    {
        $this->base_discount_amount = $baseDiscountAmount;
        return $this;
    }

    /**
     * Get base_discount_amount
     *
     * @return decimal
     */
    public function getBaseDiscountAmount()
    {
        return $this->base_discount_amount;
    }

    /**
     * Set amount_refunded
     *
     * @param string $amountRefunded
     * @return Item
     */
    public function setAmountRefunded($amountRefunded)
    {
        $this->amount_refunded = $amountRefunded;
        return $this;
    }

    /**
     * Get amount_refunded
     *
     * @return string
     */
    public function getAmountRefunded()
    {
        return $this->amount_refunded;
    }

    /**
     * Set base_amount_refunded
     *
     * @param decimal $baseAmountRefunded
     * @return Item
     */
    public function setBaseAmountRefunded($baseAmountRefunded)
    {
        $this->base_amount_refunded = $baseAmountRefunded;
        return $this;
    }

    /**
     * Get base_amount_refunded
     *
     * @return decimal
     */
    public function getBaseAmountRefunded()
    {
        return $this->base_amount_refunded;
    }

    /**
     * Set ext_order_item_id
     *
     * @param integer $extOrderItemId
     * @return Item
     */
    public function setExtOrderItemId($extOrderItemId)
    {
        $this->ext_order_item_id = $extOrderItemId;
        return $this;
    }

    /**
     * Get ext_order_item_id
     *
     * @return integer
     */
    public function getExtOrderItemId()
    {
        return $this->ext_order_item_id;
    }

    /**
     * Set order
     *
     * @param LWV\ToolkitBundle\Entity\Staff\Order $order
     * @return Item
     */
    public function setOrder(\LWV\ToolkitBundle\Entity\Staff\Order $order = null)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get order
     *
     * @return LWV\ToolkitBundle\Entity\Staff\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set items
     *
     * @param LWV\ToolkitBundle\Entity\Staff\Order $items
     * @return Item
     */
    public function setItems(\LWV\ToolkitBundle\Entity\Staff\Order $items = null)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * Get items
     *
     * @return LWV\ToolkitBundle\Entity\Staff\Order
     */
    public function getItems()
    {
        return $this->items;
    }
}