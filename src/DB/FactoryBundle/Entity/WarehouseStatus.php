<?php

namespace DB\FactoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WarehouseStatus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DB\FactoryBundle\Entity\WarehouseStatusRepository")
 */
class WarehouseStatus
{

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="status")
     * @ORM\JoinColumn(name="warehouse", referencedColumnName="id")
     * @ORM\Id
     */
    private $warehouse;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Factory", inversedBy="status")
     * @ORM\JoinColumn(name="factory", referencedColumnName="id")
     * @ORM\Id
     */
    private $factory;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="status")
     * @ORM\JoinColumn(name="product", referencedColumnName="id")
     * @ORM\Id
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
     * @ORM\Column(name="price", type="float")
     */
    private $price;


    /**
     * Set warehouse
     *
     * @param integer $warehouse
     *
     * @return WarehouseStatus
     */
    public function setWarehouse($warehouse)
    {
        $this->warehouse = $warehouse;

        return $this;
    }

    /**
     * Get warehouse
     *
     * @return integer
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * Set factory
     *
     * @param integer $factory
     *
     * @return WarehouseStatus
     */
    public function setFactory($factory)
    {
        $this->factory = $factory;

        return $this;
    }

    /**
     * Get factory
     *
     * @return integer
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Set product
     *
     * @param integer $product
     *
     * @return WarehouseStatus
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
     * @return WarehouseStatus
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
     * Set price
     *
     * @param float $price
     *
     * @return WarehouseStatus
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }


}
