<?php

namespace LWV\ToolkitBundle\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\CallbackValidator;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class PasswordRequestType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('email');
    }
    
    public function getDefaultOptions()
    {
        $collectionConstraint = new Collection(array(
            'email' => array(new Email(array('message' => 'Invalid email address')), new NotBlank())
        ));
        
        return array(
            'validation_constraint' => $collectionConstraint
        );
    }
    
    public function getName()
    {
        return 'requestpass';
    }
    
}