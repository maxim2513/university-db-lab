<?php

namespace DB\FactoryBundle\Entity;

/**
 * FactoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FactoryRepository extends \Doctrine\ORM\EntityRepository
{
    function factory(){

        return $this->findByType(1);
    }
}
