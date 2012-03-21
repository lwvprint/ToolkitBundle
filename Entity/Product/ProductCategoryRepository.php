<?php
namespace LWV\ToolkitBundle\Entity\Product;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class ProductCategoryRepository extends NestedTreeRepository
{
    // FINISH THIS!
    public function getAllCategoriesBySegment()
    {
        $dql = 'SELECT c FROM LWV\ToolkitBundle\Entity\Product\ProductCategory c ' .
               'ORDER BY c.name ASC';

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }
}