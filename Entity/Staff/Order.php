<?php

namespace LWV\ToolkitBundle\Entity\Staff;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\ToolkitBundle\Entity\Staff\Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="LWV\ToolkitBundle\Entity\Staff\OrderRepository")
 */
class Order
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
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;

    /**
     * @var string $tax_amount
     *
     * @ORM\Column(name="tax_amount", type="string", length=255)
     */
    private $tax_amount;

    /**
     * @var string $shipping_amount
     *
     * @ORM\Column(name="shipping_amount", type="string", length=255)
     */
    private $shipping_amount;

    /**
     * @var string $discount_amount
     *
     * @ORM\Column(name="discount_amount", type="string", length=255)
     */
    private $discount_amount;

    /**
     * @var string $subtotal
     *
     * @ORM\Column(name="subtotal", type="string", length=255)
     */
    private $subtotal;

    /**
     * @var string $grand_total
     *
     * @ORM\Column(name="grand_total", type="string", length=255)
     */
    private $grand_total;

    /**
     * @var string $total_paid
     *
     * @ORM\Column(name="total_paid", type="string", length=255)
     */
    private $total_paid;

    /**
     * @var string $total_refunded
     *
     * @ORM\Column(name="total_refunded", type="string", length=255)
     */
    private $total_refunded;

    /**
     * @var string $total_qty_ordered
     *
     * @ORM\Column(name="total_qty_ordered", type="string", length=255)
     */
    private $total_qty_ordered;


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
     * @return Order
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
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Order
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
     * @return Order
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return Order
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
     * Set tax_amount
     *
     * @param string $taxAmount
     * @return Order
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
     * Set shipping_amount
     *
     * @param string $shippingAmount
     * @return Order
     */
    public function setShippingAmount($shippingAmount)
    {
        $this->shipping_amount = $shippingAmount;
        return $this;
    }

    /**
     * Get shipping_amount
     *
     * @return string
     */
    public function getShippingAmount()
    {
        return $this->shipping_amount;
    }

    /**
     * Set discount_amount
     *
     * @param string $discountAmount
     * @return Order
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discount_amount = $discountAmount;
        return $this;
    }

    /**
     * Get discount_amount
     *
     * @return string
     */
    public function getDiscountAmount()
    {
        return $this->discount_amount;
    }

    /**
     * Set subtotal
     *
     * @param string $subtotal
     * @return Order
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * Get subtotal
     *
     * @return string
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set grand_total
     *
     * @param string $grandTotal
     * @return Order
     */
    public function setGrandTotal($grandTotal)
    {
        $this->grand_total = $grandTotal;
        return $this;
    }

    /**
     * Get grand_total
     *
     * @return string
     */
    public function getGrandTotal()
    {
        return $this->grand_total;
    }

    /**
     * Set total_paid
     *
     * @param string $totalPaid
     * @return Order
     */
    public function setTotalPaid($totalPaid)
    {
        $this->total_paid = $totalPaid;
        return $this;
    }

    /**
     * Get total_paid
     *
     * @return string
     */
    public function getTotalPaid()
    {
        return $this->total_paid;
    }

    /**
     * Set total_refunded
     *
     * @param string $totalRefunded
     * @return Order
     */
    public function setTotalRefunded($totalRefunded)
    {
        $this->total_refunded = $totalRefunded;
        return $this;
    }

    /**
     * Get total_refunded
     *
     * @return string
     */
    public function getTotalRefunded()
    {
        return $this->total_refunded;
    }

    /**
     * Set total_qty_ordered
     *
     * @param string $totalQtyOrdered
     * @return Order
     */
    public function setTotalQtyOrdered($totalQtyOrdered)
    {
        $this->total_qty_ordered = $totalQtyOrdered;
        return $this;
    }

    /**
     * Get total_qty_ordered
     *
     * @return string
     */
    public function getTotalQtyOrdered()
    {
        return $this->total_qty_ordered;
    }
}