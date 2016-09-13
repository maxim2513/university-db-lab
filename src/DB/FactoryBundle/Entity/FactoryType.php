<?php

namespace DB\FactoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FactoryType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FactoryType
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
     * @ORM\OneToMany(targetEntity="Factory", mappedBy="type")
     */
    private $factory;

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
     * @return FactoryType
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
     * Constructor
     */
    public function __construct()
    {
        $this->factories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add factory
     *
     * @param \DB\FactoryBundle\Entity\Factory $factory
     *
     * @return FactoryType
     */
    public function addFactory(\DB\FactoryBundle\Entity\Factory $factory)
    {
        $this->factories[] = $factory;

        return $this;
    }

    /**
     * Remove factory
     *
     * @param \DB\FactoryBundle\Entity\Factory $factory
     */
    public function removeFactory(\DB\FactoryBundle\Entity\Factory $factory)
    {
        $this->factories->removeElement($factory);
    }

    /**
     * Get factories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFactories()
    {
        return $this->factories;
    }

    /**
     * Get factory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
