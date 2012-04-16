<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use LWV\ToolkitBundle\Entity\Setting;
use LWV\ToolkitBundle\Form\ModifySettingsForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 *
 */
class SettingsController extends Controller {

	public function modifyAction() {
		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository(get_class(new Setting()));
		$allStoredSettings = $repo->findAll();

		$formData = array(
			'settings' => $allStoredSettings,
		);

		$form = $this->createForm(new ModifySettingsForm(), $formData);
		$request = $this->get('request');
		if ($request->getMethod() === 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				foreach ($formData['settings'] as $formSetting) {
					$storedSetting = $this->getSettingByName($allStoredSettings, $formSetting->getName());
					if ($storedSetting !== null) {
						$storedSetting->setValue($formSetting->getValue());
						$em->persist($storedSetting);
					}
				}

				$em->flush();

				$this->get('session')->getFlashBag()->add('notice',
						$this->get('translator')->trans('settings_changed', array(), 'LWVToolkitBundle'));
				return $this->redirect($this->generateUrl('lwv_settings_modify'));
			}
		}

		return $this->render('LWVToolkitBundle:Staff\Settings\Includes:modify.html.twig', array(
			'form' => $form->createView(),
			'sections' => $this->getSections($allStoredSettings),
		));
	}

	/**
	 * @param Setting[] $settings
	 * @return string[] (may also contain a null value)
	 */
	protected function getSections(array $settings) {
		$sections = array();

		foreach ($settings as $setting) {
			$section = $setting->getSection();
			if (!in_array($section, $sections)) {
				$sections[] = $section;
			}
		}

		sort($sections);

		return $sections;
	}

	/**
	 * @param Setting[] $settings
	 * @param string $name
	 * @return Setting|null
	 */
	protected function getSettingByName(array $settings, $name) {
		foreach ($settings as $setting) {
			if ($setting->getName() === $name) {
				return $setting;
			}
		}

		return null;
	}

}