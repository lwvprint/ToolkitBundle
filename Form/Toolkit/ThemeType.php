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
            ->add('theme_name', null, array('required' => false))
            ->add('theme_path', null, array('required' => false))
        ;
    }
    
    public function getDefaultOptions(array $options)
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
