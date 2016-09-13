<?php

namespace DB\FactoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factory
 *
 * @ORM\Table(name="factory")
 * @ORM\Entity(repositoryClass="FactoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Factory
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="date")
     */
    private $dateCreate;

    /**
     * @ORM\ManyToOne(targetEntity="FactoryType", inversedBy="factory")
     * @ORM\JoinColumn(name="type", referencedColumnName="id")
     */
    private $type;



    /**
     * @ORM\OneToMany(targetEntity="WarehouseStatus", mappedBy="factory")
     */
    protected  $status;

    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="factory")
     */
    protected  $ordersFactory;
    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="supplier")
     */
    protected  $ordersSupplier;

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
     *
     * @return Factory
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
     * Set address
     *
     * @param string $address
     *
     * @return Factory
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Factory
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \DB\FactoryBundle\Entity\Product $product
     *
     * @return Factory
     */
    public function addProduct(\DB\FactoryBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \DB\FactoryBundle\Entity\Product $product
     */
    public function removeProduct(\DB\FactoryBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Factory
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add status
     *
     * @param \DB\FactoryBundle\Entity\WarehouseStatus $status
     *
     * @return Factory
     */
    public function addStatus(\DB\FactoryBundle\Entity\WarehouseStatus $status)
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * Remove status
     *
     * @param \DB\FactoryBundle\Entity\WarehouseStatus $status
     */
    public function removeStatus(\DB\FactoryBundle\Entity\WarehouseStatus $status)
    {
        $this->status->removeElement($status);
    }

    /**
     * Get status
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add order
     *
     * @param \DB\FactoryBundle\Entity\Orders $order
     *
     * @return Factory
     */
    public function addOrder(\DB\FactoryBundle\Entity\Orders $order)
    {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \DB\FactoryBundle\Entity\Orders $order
     */
    public function removeOrder(\DB\FactoryBundle\Entity\Orders $order)
    {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Add ordersFactory
     *
     * @param \DB\FactoryBundle\Entity\Orders $ordersFactory
     *
     * @return Factory
     */
    public function addOrdersFactory(\DB\FactoryBundle\Entity\Orders $ordersFactory)
    {
        $this->ordersFactory[] = $ordersFactory;

        return $this;
    }

    /**
     * Remove ordersFactory
     *
     * @param \DB\FactoryBundle\Entity\Orders $ordersFactory
     */
    public function removeOrdersFactory(\DB\FactoryBundle\Entity\Orders $ordersFactory)
    {
        $this->ordersFactory->removeElement($ordersFactory);
    }

    /**
     * Get ordersFactory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrdersFactory()
    {
        return $this->ordersFactory;
    }

    /**
     * Add ordersSupplier
     *
     * @param \DB\FactoryBundle\Entity\Orders $ordersSupplier
     *
     * @return Factory
     */
    public function addOrdersSupplier(\DB\FactoryBundle\Entity\Orders $ordersSupplier)
    {
        $this->ordersSupplier[] = $ordersSupplier;

        return $this;
    }

    /**
     * Remove ordersSupplier
     *
     * @param \DB\FactoryBundle\Entity\Orders $ordersSupplier
     */
    public function removeOrdersSupplier(\DB\FactoryBundle\Entity\Orders $ordersSupplier)
    {
        $this->ordersSupplier->removeElement($ordersSupplier);
    }

    /**
     * Get ordersSupplier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrdersSupplier()
    {
        return $this->ordersSupplier;
    }

    public function __toString(){
                                return $this->getName() . ' (' . $this->getDateCreate()->format('d-m-Y') . ')';

    }
}
