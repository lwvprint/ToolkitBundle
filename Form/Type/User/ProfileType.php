<?php

namespace LWV\ToolkitBundle\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormError;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('pubName', null, array('label' => 'Pub Name'));
        $builder->add('address1', null, array('label' => 'Address 1'));
        $builder->add('address2', null, array('label' => 'Address 2'));
        $builder->add('city');
        $builder->add('county');
        $builder->add('postcode');
        $builder->add('telephone');
    }

    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'LWV\ToolkitBundle\Entity\User\Profile',
            'validation_groups' => 'profile',
        );
    }

    public function getName()
    {
        return 'profile';
    }
}