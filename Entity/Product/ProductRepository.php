<?php
namespace LWV\ToolkitBundle\Entity\Product;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{  
    public function getActiveProductsWithImages()
    {
        $dql = 'SELECT p, i FROM LWV\ToolkitBundle\Entity\Product\Product p ' .
               'LEFT JOIN p.images i ' .
               'WHERE p.is_active = 1 ' .
               'ORDER BY p.name ASC';

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }
}