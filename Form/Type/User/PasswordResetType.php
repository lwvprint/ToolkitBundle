<?php

namespace LWV\ToolkitBundle\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\CallbackValidator;

class PasswordResetType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('password', 'password', array('label' => 'New Password'));
        $builder->add('confirmPassword', 'password', array('label' => 'Confirm Password', 'property_path' => false));
        $builder->addValidator(new CallbackValidator(function($form)
            {
                if($form['confirmPassword']->getData() != $form['password']->getData()) {
                    $form['confirmPassword']->addError(new FormError('Passwords must match.'));
                }
            }));
    }
    
    /*
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'LWV\ToolkitBundle\Entity\User\User',
        );
    }
    */
    
    public function getName()
    {
        return 'resetpass';
    }
    
}