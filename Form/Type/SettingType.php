<?php

namespace LWV\ToolkitBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 *
 */
class SettingType extends AbstractType {

	/**
	 * {@inheritDoc}
	 */
	public function buildForm(FormBuilder $builder, array $options) {
		$builder->add('name', 'hidden');
		$builder->add('section', 'hidden');
		$builder->add('nice_name', 'hidden');
		$builder->add('description', 'hidden');
		$builder->add('value', null, array('attr' => array('class' => 'input-small'), 'required' => false,));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return 'lwv_config_setting';
	}

}