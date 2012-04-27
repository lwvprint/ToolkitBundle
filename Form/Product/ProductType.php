<?php

namespace LWV\ToolkitBundle\Form\Product;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('reference')
            ->add('description')
            ->add('active_from')
            ->add('active_till')
            ->add('is_active')
            ->add('category', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\Product\ProductCategory',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.toolkit = :id')
                        ->setParameter('id', '2')
                        ->orderBy('u.lvl', 'ASC')
                        ->orderBy('u.name', 'ASC');
                },
                'empty_value' => 'Choose an option',
                'property' => 'name',
            ));
    }
    
    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'LWV\ToolkitBundle\Entity\Product\Product',
        );
    }

    public function getName()
    {
        return 'lwv_toolkitbundle_product_type';
    }
}
