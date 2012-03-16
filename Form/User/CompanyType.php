<?php

namespace LWV\ToolkitBundle\Form\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            //->add('lft')
            //->add('rgt')
            //->add('root')
            //->add('lvl')
            ->add('name')
            ->add('account_no')
            ->add('address1')
            ->add('address2')
            ->add('town', null, array('required' => false))
            ->add('city', null, array('required' => false))
            ->add('post_code')
            ->add('email')
            ->add('website')
            ->add('is_active')
            ->add('parent', 'entity', array(
                'class' => 'LWV\ToolkitBundle\Entity\User\Company',
                'property' => 'name',
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
        return 'lwv_toolkitbundle_user_companytype';
    }
}
