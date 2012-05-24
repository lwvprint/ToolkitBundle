<?php

namespace LWV\ToolkitBundle\Form\Product;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        //var_dump($options);
        //$id = $options['toolkitId'];
        //$id = '1';
        
        $builder
            ->add('name')
            ->add('slug')
            ->add('reference')
            ->add('description', null, array('required' => false))
            ->add('is_active', null, array('label' => 'Active?', 'required' => false))
            ->add('expires', 'checkbox', array('label' => 'Expires?', 'property_path' => false, 'required' => false))
            ->add('active_from', null, array('required' => false))
            ->add('active_till', null, array('required' => false))
            ->add('category', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\Product\ProductCategory',
                'query_builder' => function(EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('u')
                        ->where('u.toolkit = :id')
                        ->setParameter('id', $options['toolkitId'])
                        ->orderBy('u.root', 'ASC')
                        ->addOrderBy('u.lft', 'ASC');
                },
                'empty_value' => 'Choose an option',
                'property' => 'indentedName',
            ))
            ->add('tags', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\Product\Tag',
                //'expanded' => true,
                'property' => 'tag',
                'multiple' => true
                ));
    }
    
    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'LWV\ToolkitBundle\Entity\Product\Product',
            'toolkitId' => null
        );
    }

    public function getName()
    {
        return 'product_type';
    }
}
