<?php

namespace LWV\ToolkitBundle\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormError;

use LWV\ToolkitBundle\Form\Type\User\ProfileType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('username');
        $builder->add('email');
        $builder->add('profile', new ProfileType());
    }
    
    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'LWV\ToolkitBundle\Entity\User\User',
            'validation_groups' => 'profile',
            'cascade_validation' => true
        );
    }
    
    public function getName()
    {
        return 'user';
    }
}