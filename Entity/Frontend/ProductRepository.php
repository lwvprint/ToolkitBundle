<?php
namespace LWV\ToolkitBundle\Entity\Frontend;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function getAllProductsWithImages()
    {
        $dql = 'SELECT p, i FROM LWV\ToolkitBundle\Entity\Frontend\Product p ' .
               'LEFT JOIN p.images i ' .
               'ORDER BY p.name DESC';

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }
}