<?php

namespace LWV\ToolkitBundle\Form\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('account_no', null, array('label' => 'Account #'))
            ->add('address1', null, array('label' => 'Address 1'))
            ->add('address2', null, array('label' => 'Address 2', 'required' => false))
            ->add('town', null, array('required' => false))
            ->add('city', null, array('required' => false))
            ->add('post_code', null, array('label' => 'Post Code'))
            ->add('email', 'email', array('required' => false))
            ->add('website', 'url', array('required' => false))
            ->add('is_active', null, array('label' => 'Active?', 'required' => false))
            ->add('parent', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\User\Company',
                'property' => 'name',
                'required' => false
            ))
            ->add('toolkit', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\Toolkit\Toolkit',
                'property' => 'name',
                'required' => false
            ))
        ;
    }

    public function getName()
    {
        return 'lwv_toolkitbundle_user_companytype';
    }
}
