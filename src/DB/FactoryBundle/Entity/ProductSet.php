<?php

namespace DB\FactoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * ProductSet
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ProductSet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="setProduct")
     * @ORM\JoinColumn(name="orders", referencedColumnName="id")
     */
    private $orders;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="setProduct")
     * @ORM\JoinColumn(name="product", referencedColumnName="id")
     */
    private $product;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty", type="integer")
     */
    private $qty;

    /**
     * @var float
     *
     * @ORM\Column(name="discount", type="float")
     */
    private $discount;


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
     * Set orders
     *
     * @param integer $orders
     *
     * @return ProductSet
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return integer
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set product
     *
     * @param integer $product
     *
     * @return ProductSet
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return integer
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     *
     * @return ProductSet
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return integer
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set discount
     *
     * @param float $discount
     *
     * @return ProductSet
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}
