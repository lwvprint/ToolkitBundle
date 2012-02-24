<?php
namespace LWV\ToolkitBundle\Entity\Frontend;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function getAllCategoriesBySegment()
    {
        $dql = 'SELECT c FROM LWV\ToolkitBundle\Entity\Frontend\Category c ' .
               'ORDER BY c.name ASC';

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }
}