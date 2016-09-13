<?php

namespace DB\FactoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 * @ORM\Entity(repositoryClass="ProductRepository")
 * @ORM\Table(name="product")
 * @ORM\HasLifecycleCallbacks
 */
class Product
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
     * @var float
     *
     * @ORM\Column(name="weight", type="float")
     */
    private $weight;


    /**
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="consumables")
     */
    private $main_product;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="main_product")
     * @ORM\JoinTable(name="consumables",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="consumables_id", referencedColumnName="id")}
     *      )
     */
    private $consumables;

    /**
     * @ORM\OneToMany(targetEntity="WarehouseStatus", mappedBy="product")
     */
    protected  $status;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="ProductSet", mappedBy="product")
     */
    private $setProduct;

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
     * @return Product
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
     * Set weight
     *
     * @param float $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->main_product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->consumables = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mainProduct
     *
     * @param \DB\FactoryBundle\Entity\Product $mainProduct
     *
     * @return Product
     */
    public function addMainProduct(\DB\FactoryBundle\Entity\Product $mainProduct)
    {
        $this->main_product[] = $mainProduct;

        return $this;
    }

    /**
     * Remove mainProduct
     *
     * @param \DB\FactoryBundle\Entity\Product $mainProduct
     */
    public function removeMainProduct(\DB\FactoryBundle\Entity\Product $mainProduct)
    {
        $this->main_product->removeElement($mainProduct);
    }

    /**
     * Get mainProduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMainProduct()
    {
        return $this->main_product;
    }

    /**
     * Add consumable
     *
     * @param \DB\FactoryBundle\Entity\Product $consumable
     *
     * @return Product
     */
    public function addConsumable(\DB\FactoryBundle\Entity\Product $consumable)
    {
        $this->consumables[] = $consumable;

        return $this;
    }

    /**
     * Remove consumable
     *
     * @param \DB\FactoryBundle\Entity\Product $consumable
     */
    public function removeConsumable(\DB\FactoryBundle\Entity\Product $consumable)
    {
        $this->consumables->removeElement($consumable);
    }

    /**
     * Get consumables
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConsumables()
    {
        return $this->consumables;
    }

    /**
     * Add status
     *
     * @param \DB\FactoryBundle\Entity\WarehouseStatus $status
     *
     * @return Product
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
     * Add set
     *
     * @param \DB\FactoryBundle\Entity\orders $set
     *
     * @return Product
     */
    public function addSet(\DB\FactoryBundle\Entity\orders $set)
    {
        $this->set[] = $set;

        return $this;
    }

    /**
     * Remove set
     *
     * @param \DB\FactoryBundle\Entity\orders $set
     */
    public function removeSet(\DB\FactoryBundle\Entity\orders $set)
    {
        $this->set->removeElement($set);
    }

    /**
     * Get set
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSet()
    {
        return $this->set;
    }

    /**
     * Add setProduct
     *
     * @param \DB\FactoryBundle\Entity\ProductSet $setProduct
     *
     * @return Product
     */
    public function addSetProduct(\DB\FactoryBundle\Entity\ProductSet $setProduct)
    {
        $this->setProduct[] = $setProduct;

        return $this;
    }

    /**
     * Remove setProduct
     *
     * @param \DB\FactoryBundle\Entity\ProductSet $setProduct
     */
    public function removeSetProduct(\DB\FactoryBundle\Entity\ProductSet $setProduct)
    {
        $this->setProduct->removeElement($setProduct);
    }

    /**
     * Get setProduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSetProduct()
    {
        return $this->setProduct;
    }
}
