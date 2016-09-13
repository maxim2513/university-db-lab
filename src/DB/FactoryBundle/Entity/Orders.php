<?php

namespace DB\FactoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DB\FactoryBundle\Entity\OrdersRepository")
 */
class Orders
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
     * @ORM\ManyToOne(targetEntity="Factory", inversedBy="ordersFactory")
     * @ORM\JoinColumn(name="factory", referencedColumnName="id")
     */
    private $factory;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Factory", inversedBy="ordersSupplier")
     * @ORM\JoinColumn(name="supplier", referencedColumnName="id")
     */
    private $supplier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $dateCreate;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Payment", inversedBy="orders")
     * @ORM\JoinColumn(name="payment", referencedColumnName="id")
     */
    private $payment;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Shipping", inversedBy="orders")
     * @ORM\JoinColumn(name="shipping", referencedColumnName="id")
     */
    private $shipping;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="ProductSet", mappedBy="orders")
     */
    private $setProduct;


    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="orders")
     */

    private $comments;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="order")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    private $status;


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
     * Set factory
     *
     * @param integer $factory
     *
     * @return Orders
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
     * Set supplier
     *
     * @param integer $supplier
     *
     * @return Orders
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return integer
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Set setProduct
     *
     * @param integer $setProduct
     *
     * @return Orders
     */
    public function setSetProduct($setProduct)
    {
        $this->setProduct = $setProduct;

        return $this;
    }

    /**
     * Get setProduct
     *
     * @return integer
     */
    public function getSetProduct()
    {
        return $this->setProduct;
    }

    /**
     * Set comments
     *
     * @param integer $comments
     *
     * @return Orders
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return integer
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Orders
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setProduct = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add setProduct
     *
     * @param \DB\FactoryBundle\Entity\product $setProduct
     *
     * @return Orders
     */
    public function addSetProduct(\DB\FactoryBundle\Entity\product $setProduct)
    {
        $this->setProduct[] = $setProduct;

        return $this;
    }

    /**
     * Remove setProduct
     *
     * @param \DB\FactoryBundle\Entity\product $setProduct
     */
    public function removeSetProduct(\DB\FactoryBundle\Entity\product $setProduct)
    {
        $this->setProduct->removeElement($setProduct);
    }

    /**
     * Add comment
     *
     * @param \DB\FactoryBundle\Entity\Comment $comment
     *
     * @return Orders
     */
    public function addComment(\DB\FactoryBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \DB\FactoryBundle\Entity\Comment $comment
     */
    public function removeComment(\DB\FactoryBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Orders
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
     * Set payment
     *
     * @param \DB\FactoryBundle\Entity\Payment $payment
     *
     * @return Orders
     */
    public function setPayment(\DB\FactoryBundle\Entity\Payment $payment = null)
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * Get payment
     *
     * @return \DB\FactoryBundle\Entity\Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Set shipping
     *
     * @param \DB\FactoryBundle\Entity\Shipping $shipping
     *
     * @return Orders
     */
    public function setShipping(\DB\FactoryBundle\Entity\Shipping $shipping = null)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Get shipping
     *
     * @return \DB\FactoryBundle\Entity\Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }
}
