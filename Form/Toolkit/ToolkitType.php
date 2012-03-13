<?php

namespace LWV\ToolkitBundle\Form\Toolkit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ToolkitType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('company_id')
            ->add('name')
            ->add('url')
            ->add('is_active')
            ->add('is_demo')
            ->add('is_secure')
            ->add('is_payment')
            ->add('maintenance_mode')
            ->add('maintenance_message')
            ->add('status_id')
            ->add('pricing_id')
            ->add('delivery_id')
            ->add('theme_id')
            ->add('can_edit_profile')
            ->add('can_edit_password')
            ->add('enable_budget')
            ->add('budget')
            ->add('staff_operator_id')
            ->add('company_operator_id')
            ->add('categories')
        ;
    }

    public function getName()
    {
        return 'lwv_toolkitbundle_toolkit_toolkittype';
    }
}
