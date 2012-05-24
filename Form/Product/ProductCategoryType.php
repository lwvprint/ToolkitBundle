<?php

namespace LWV\ToolkitBundle\Form\Product;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProductCategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            //->add('lft')
            //->add('rgt')
            //->add('root')
            //->add('lvl')
            ->add('name')
            ->add('slug')
            ->add('description')
            ->add('image', 'file')
            //->add('created_at')
            //->add('updated_at')
            //->add('parent', 'entity', array(
            //    'class' => 'LWV\ToolkitBundle\Entity\Product\ProductCategory',
            //    'property' => 'name',
            //    'required' => false
            //))
            ->add('parent', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\Product\ProductCategory',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.root', 'ASC')
                        ->addOrderBy('u.lft', 'ASC');
                },
                'property' => 'indentedName',
                'required' => false
            ))
            ->add('toolkit', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\Toolkit\Toolkit',
                'property' => 'name'
            ))
        ;
    }

    public function getName()
    {
        return 'product_category';
    }
}
