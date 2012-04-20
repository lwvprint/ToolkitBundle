<?php

namespace LWV\ToolkitBundle\Form\Toolkit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormError;

class ThemeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name', null, array('required' => false))
            ->add('path', null, array('required' => false))
            ->addValidator(new CallbackValidator(function($form)
            {
                if($form['name']->getData() != NULL && $form['path']->getData() == NULL) {
                    $form['path']->addError(new FormError('Theme path must be provided.'));
                }
            }));
        ;
    }
    
    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'LWV\ToolkitBundle\Entity\Theme\Theme',
        );
    }

    public function getName()
    {
        return 'theme';
    }
}
