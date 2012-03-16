<?php

namespace LWV\ToolkitBundle\Form\Toolkit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

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
            ->add('budget_amount')
            ->add('staff_operator', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\User\User',
                'property' => 'username'
            ))
            ->add('company_operator', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\User\User',
                'property' =>'username'
            ))
        ;
    }

    public function getName()
    {
        return 'lwv_toolkitbundle_toolkit_toolkittype';
    }
}
