<?php

/**
 * bxSlider Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017, Respinar
 * @author     Respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://respinar.com/
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Respinar\bxSlider'
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'Respinar\bxSlider\ModulebxSlider'     => 'system/modules/bxslider/library/Respinar/bxSlider/FrontendModules/ModulebxSlider.php',

	// Models
	'Respinar\bxSlider\bxSliderModel'      => 'system/modules/bxslider/library/Respinar/bxSlider/Models/bxSliderModel.php',
	'Respinar\bxSlider\bxSliderSlideModel' => 'system/modules/bxslider/library/Respinar/bxSlider/Models/bxSliderSlideModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_bxslider'   => 'system/modules/bxslider/templates/module',
	'bxslider_slide' => 'system/modules/bxslider/templates/slide',
));
