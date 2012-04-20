<?php

namespace LWV\ToolkitBundle\Form\Toolkit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormError;

use LWV\ToolkitBundle\Form\Toolkit\ThemeType;

class ToolkitType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('url')
            ->add('is_active', null, array('required' => false))
            ->add('is_demo', null, array('required' => false  ))
            ->add('is_secure', null, array('required' => false))
            ->add('is_payment', null, array('required' => false))
            ->add('maintenance_mode', null, array('required' => false))
            ->add('maintenance_message')
            ->add('can_edit_profile', null, array('required' => false))
            ->add('can_edit_password', null, array('required' => false))
            ->add('enable_budget', null, array('required' => false))
            ->add('budget_amount', null, array('required' => false))
            ->add('staff_operator', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\User\User',
                'property' => 'username'
            ))
            ->add('company_operator', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\User\User',
                'property' =>'username'
            ))
            ->add('theme', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\Theme\Theme',
                'property' => 'name',
                'empty_value' => 'Choose a theme',
                'required' => false
            ))
            ->add('new_theme', new ThemeType(), array('property_path' => false))
        ;
    }
    
    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'LWV\ToolkitBundle\Entity\Toolkit\Toolkit',
        );
    }

    public function getName()
    {
        return 'toolkit';
    }
}
